@extends('admin.layouts.admin')

@section('content')

<div class="page-content">
    <section class="section">
        <div class="page-heading">
            <div class="row">
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <h3>Menu</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-last">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <a href="{{ route('product.create') }}" class="btn btn-success d-flex align-items-center">
                        <i data-feather="user-plus" class="me-2"></i>
                        Create New Menu
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th style="text-align: center;">Description</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ Str::limit($product->description, 50) }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->stock }}</td>
                            <td><img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" width="50"></td>
                            <td>
                                <a href="{{ route('product.show', $product->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eye me-1"></i>Detail</a>
                                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square me-1"></i>Edit</a>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?')"><i class="bi bi-trash me-1"></i>Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@endsection
