
@extends('layouts.app')
@section('title', 'Skincare Products')
@section('content')

    <h2>Skincare Products</h2>

    <p>
        <a href="{{ route('skincare.create') }}" class="btn btn-primary">
            Add Skincare Product
        </a>
    </p>

    <p>
        <strong>Category Filter:</strong>
        @foreach ($categories as $item)
            <a href="{{ route('skincare.index', ['category_id' => $item->id, 'brand' => $brand]) }}">
                {{ $item->name }}
            </a>
        @endforeach
    </p>

    <p>
        <strong>Brand Filter:</strong>
        <a href="{{ route('skincare.index', ['category_id' => $category, 'brand' => 'Celeteque']) }}">Celeteque</a>
        <a href="{{ route('skincare.index', ['category_id' => $category, 'brand' => 'Luxe Organix']) }}">Luxe Organix</a>
        <a href="{{ route('skincare.index', ['category_id' => $category, 'brand' => 'The Ordinary']) }}">The Ordinary</a>
        <a href="{{ route('skincare.index', ['category_id' => $category, 'brand' => 'Belo']) }}">Belo</a>
        <a href="{{ route('skincare.index', ['category_id' => $category, 'brand' => 'QuickFX']) }}">QuickFX</a>
        <a href="{{ route('skincare.index', ['category_id' => $category, 'brand' => 'Oxecure']) }}">Oxecure</a>
    </p>

    <p>
        <a href="{{ route('skincare.index') }}">Clear All Filters</a>
    </p>

    <h3>Active Filters</h3>

    <p>Category: {{ $category }}</p>
    <p>Brand: {{ $brand }}</p>

    <table class="table table-striped table-bordered">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Price</th>
        </tr>

        @forelse ($skincare as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>
                    <a href="{{ route('skincare.show', $item['id']) }}">
                        {{ $item['product'] }}
                    </a>
                </td>
                <td>{{ $item['brand'] }}</td>
                <td>{{ $item->category->name }}</td>
                <td>₱{{ $item['price'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="5">As of now, there is no record!</td>
            </tr>
        @endforelse
    </table>

    <p>Number of Queries: {{ count(DB::getQueryLog()) }}</p>

@endsection
