@extends('layouts.app')

@section('content')

<section class="search-results">
    <div class="card-heading">
        <h2>Search Results</h2>
    </div>
    <div class="row">
        @if($products->isEmpty())
            <div class="col-md-12">
                <div class="alert alert-warning" role="alert">
                    No products found matching your query.
                </div>
            </div>
        @else
            @foreach ($products as $product)
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
            @endforeach
        @endif
    </div>
</section>
@endsection
