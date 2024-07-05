@extends('layouts.app')

@section('content')

<section class="product">
    <div class="nasi">
        <div class="card-heading">
            <h2>Aneka Nasi</h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                @if ($product->category_id == 1)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                @endif
                                <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                                <p class="card-stock">Stock: {{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="lauk">
        <div class="card-heading">
            <h2>Lauk Pauk</h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                @if ($product->category_id == 2)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                @endif
                                <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                                <p class="card-stock">Stock: {{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="sayur">
        <div class="card-heading">
            <h2>Aneka Sayur</h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                @if ($product->category_id == 3)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                @endif
                                <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                                <p class="card-stock">Stock: {{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="minum">
        <div class="card-heading">
            <h2>Minuman</h2>
        </div>
        <div class="row">
            @foreach ($products as $product)
                @if ($product->category_id == 4)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->description }}</p>
                                <p class="card-number">{{ number_format($product->price, 0, ',', '.') }}</p>
                                @if ($product->image)
                                    <img src="{{ Storage::url($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                                @endif
                                <form action="{{ route('cart.addToCart', ['productId' => $product->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                                <p class="card-stock">Stock: {{ $product->stock }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>
    
@endsection
