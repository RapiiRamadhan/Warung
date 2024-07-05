@extends('admin.layouts.admin')

@section('content')

<div class="page-content">
    <section class="section">
        <div class="page-heading">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Order Details</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4>Order ID: {{ $order->id }}</h4>
                <p><strong>User:</strong> {{ $order->user->name }}</p>
                <p><strong>Address:</strong> {{ $order->alamat }}</p>
                <p><strong>Kota:</strong> {{ $order->kota }}</p>
                <p><strong>Total:</strong> Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                <p><strong>Status:</strong> {{ $order->status }}</p>
                @if ($order->tanggal_pengiriman instanceof \Carbon\Carbon)
                    <p><strong>Delivery Date:</strong> {{ $order->tanggal_pengiriman }}</p>
                @else
                    <p><strong>Delivery Date:</strong> -</p>
                @endif
                <hr>
                <h5>Order Items</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
