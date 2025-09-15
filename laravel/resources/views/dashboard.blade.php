@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

    <h2>Products</h2>

    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Base Price</th>
                <th>Final Price</th>
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->category->title ?? '-' }}</td>
                    <td>£{{ number_format($product->price, 2) }}</td>
                    <td class="text-success">${{ number_format($product->discounted_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

@endsection