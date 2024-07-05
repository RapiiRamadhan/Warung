<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::with('product')->get();
        $isEmpty = $cartItems->isEmpty(); // Periksa apakah keranjang kosong
        return view('cart.index', compact('cartItems', 'isEmpty'));
    }

    public function addToCart(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        $cartItem = Cart::where('product_id', $productId)->first();

        if ($cartItem) {
            // Cek apakah jumlah dalam keranjang tidak melebihi stok
            if ($cartItem->quantity + 1 <= $product->stock) {
                $cartItem->update(['quantity' => $cartItem->quantity + 1]);
            } else {
                // Jika melebihi stok, beri respons error
                if ($request->ajax()) {
                    return response()->json(['error' => 'Stok produk tidak mencukupi']);
                }
                return redirect()->route('cart.index')->withErrors(['error' => 'Stok produk tidak mencukupi']);
            }
        } else {
            // Jika produk belum ada di keranjang, buat baru
            Cart::create([
                'product_id' => $productId,
                'quantity' => 1
            ]);
        }

        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('cart.index');
    }

    public function removeFromCart(Request $request, $productId)
    {
        $cartItem = Cart::where('product_id', $productId)->first();

        if ($cartItem) {
            if ($cartItem->quantity > 1) {
                $cartItem->update(['quantity' => $cartItem->quantity - 1]);
            } else {
                $cartItem->delete();
            }
        }

        return redirect()->route('cart.index');
    }

    public function removeAllFromCart(Request $request, $productId)
    {
        $cartItems = Cart::where('product_id', $productId)->get();

        foreach ($cartItems as $cartItem) {
            $cartItem->delete();
        }

        return redirect()->route('cart.index');
    }

    public function cartCount()
    {
        $cartCount = Cart::count();
        return response()->json(['count' => $cartCount]);
    }
}
