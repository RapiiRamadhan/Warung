@extends('admin.layouts.admin')

@section('content')

<div class="page-content">
    <section class="section">
        <div class="page-heading">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <h3>View Order</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-last">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active" aria-current="page">View Order</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h4>Order Details</h4>
                        <p>Order ID: {{ $order->id }}</p>
                        <p>User: {{ $order->user->name }}</p>
                        <p>Total: Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                        @if ($order->tanggal_pengiriman instanceof \Carbon\Carbon)
                            <p>Delivery Date: {{ $order->tanggal_pengiriman }}</p>
                        @else
                            <p>Delivery Date: -</p>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="status">Update Status:</label>
                                <select name="status" id="status" class="form-control mt-3">
                                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Update Status</button>
                        </form>
                    </div>
                </div>
            
                <div class="col mt-3">
                    <h4>Order Items</h4>
                </div>
                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->product->name }}</td>
                                <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>Rp {{ number_format($detail->price * $detail->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-right"><strong>Total</strong></td>
                            <td><strong>Rp {{ number_format($order->total, 0, ',', '.') }}</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
