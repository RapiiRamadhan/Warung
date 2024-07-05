<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderDetailController extends Controller
{
    public function details (Order $order)
    {
        $order->load('orderDetails.product');

        return view('admin.orders.details', compact('order'));
    }
}
