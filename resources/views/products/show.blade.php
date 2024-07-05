@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>{{ $product->price }}</p>
    @if ($product->image)
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" width="200">
    @endif
    <p class="card-stock">Stock: {{ $product->stock }}</p>
@endsection
