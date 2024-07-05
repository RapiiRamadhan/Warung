@extends('admin.layouts.admin')

@section('content')
    <h1>Menu Details</h1>
    <table class="table">
        <tbody>
            <tr>
                <th>Name</th>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <th>Price</th>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{ $product->category->name }}</td> 
            </tr>
            <tr>
                <th>Stock</th>
                <td>{{ $product->stock }}</td> 
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50"></td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
@endsection
