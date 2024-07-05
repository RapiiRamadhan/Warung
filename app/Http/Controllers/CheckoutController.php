<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Midtrans\Config;
use Midtrans\Snap;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        $isEmpty = $cartItems->isEmpty(); // Check if cart is empty

        $subtotal = 0;
        foreach ($cartItems as $cartItem) {
            $subtotal += $cartItem->product->price * $cartItem->quantity;
        }

        $shippingCost = 0; // default shipping cost
        $total = $subtotal + $shippingCost;

        return view('checkout', compact('cartItems', 'isEmpty', 'subtotal', 'shippingCost', 'total'));
    }

    public function getCities()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.rajaongkir.com/starter/city', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
            ]
        ]);

        $cities = json_decode($response->getBody()->getContents(), true)['rajaongkir']['results'];

        return response()->json($cities);
    }

    public function calculateShipping(Request $request)
    {
        $validatedData = $request->validate([
            'city_id' => 'required|integer',
        ]);

        $client = new Client();
        $response = $client->request('POST', 'https://api.rajaongkir.com/starter/cost', [
            'headers' => [
                'key' => env('RAJAONGKIR_API_KEY'),
                'content-type' => 'application/x-www-form-urlencoded',
            ],
            'form_params' => [
                'origin' => '501', // Your origin city ID
                'destination' => $validatedData['city_id'],
                'weight' => 1000, // Default weight
                'courier' => 'jne', // Default courier
            ],
        ]);

        $cost = json_decode($response->getBody()->getContents(), true)['rajaongkir']['results'][0]['costs'][0]['cost'][0]['value'];
        $formattedCost = number_format($cost, 0, ',', '.');

        return response()->json(['shipping_cost' => $formattedCost]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'alamat' => 'required|string',
            'kota' => 'required|string',
            'catatan' => 'nullable|string',
            'ongkos_kirim' => 'required|numeric',
            'subtotal' => 'required|numeric',
            'total' => 'required|numeric',
            'tanggal_pengiriman' => 'required|date', // Validasi tanggal pengiriman
        ]);
    
        // Create new order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->alamat = $validatedData['alamat'];
        $order->kota = $validatedData['kota'];
        $order->catatan = $request->catatan;
        $order->ongkos_kirim = $validatedData['ongkos_kirim'];
        $order->subtotal = $validatedData['subtotal'];
        $order->total = $validatedData['total'];
        $order->tanggal_pengiriman = Carbon::parse($validatedData['tanggal_pengiriman']); // Simpan tanggal pengiriman
        $order->save();
    
        // Reduce product stock after order is successfully stored
        $cartItems = Cart::with('product')->get();
        foreach ($cartItems as $cartItem) {
            $product = Product::find($cartItem->product_id);
            if ($product) {
                $product->stock -= $cartItem->quantity;
                $product->save();
            }
        }
    
        // Create order details
        foreach ($cartItems as $cartItem) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $cartItem->product_id;
            $orderDetail->quantity = $cartItem->quantity;
            $orderDetail->price = $cartItem->product->price;
            $orderDetail->save();
        }

        // Midtrans Payment
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');

        $params = [
            'transaction_details' => [
                'order_id' => $order->id,
                'gross_amount' => $order->total, // Using total amount directly
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'address' => $order->alamat, // Corrected to use order's address
            ],
            'item_details' => $order->orderDetails->map(function ($detail) {
                return [
                    'id' => $detail->product_id,
                    'price' => $detail->price, // Ensure this is the correct price
                    'quantity' => $detail->quantity,
                    'name' => $detail->product->name,
                ];
            })->toArray(),
        ];

        // Adding shipping cost as an item detail
        $params['item_details'][] = [
            'id' => 'shipping',
            'price' => $order->ongkos_kirim, // Using correct shipping cost
            'quantity' => 1,
            'name' => 'Shipping Cost',
        ];

        try {
            $snapToken = Snap::getSnapToken($params);
            return view('checkout-payment', ['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function success()
    {
        return view('checkout-success');
    }

    public function history()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();

        return view('products.history', compact('orders'));
    }

    public function paymentHistory(Order $order)
    {
        // Get payment details from Midtrans or other payment provider if implemented
        // For simplicity, assuming we retrieve a fake payment status here
        $paymentStatus = 'Paid'; // This can be retrieved from a payment gateway

        return view('products.payment', compact('order', 'paymentStatus'));
    }
}
