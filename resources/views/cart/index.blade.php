@extends('layouts.app')

@section('content')

    <section class="cart">
        <div class="card">
            <div class="card-heading">
                <h2>Keranjang Belanja</h2>
            </div>
            @if($isEmpty)
                <div class="text-center">
                    <p>Keranjang Anda masih kosong.</p>
                </div>
            @else
            <table class="table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if ($item->product->image)
                                    <img src="{{ Storage::url($item->product->image) }}" alt="{{ $item->product->name }}">
                                @else
                                    <img src="/path/to/default-image.jpg" alt="Default Image" >
                                @endif
                            </td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ number_format($item->product->price, 0, ',', '.') }}</td>
                            <td>
                                <div class="quantity-control">
                                    <form action="{{ route('cart.addToCart', $item->product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-success">+</button>
                                    </form>
                                    <span class="quantity">{{ $item->quantity }}</span>
                                    <form action="{{ route('cart.removeFromCart', $item->product->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger">-</button>
                                    </form>
                                </div>
                            </td>                        
                            <td>{{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('cart.removeAllFromCart', $item->product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-warning">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center button-group-up">
                <a href="{{ route('products.index') }}" class="btn btn-primary mx-2">Lanjut Belanja</a>
                <a href="{{ route('checkout.index') }}" class="btn btn-success mx-2">Checkout</a>
            </div>        
            @endif
        </div>
    </section>

@endsection
