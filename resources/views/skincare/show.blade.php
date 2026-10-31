@extends('layouts.app')
@section('title', $item['product'])
@section('content')

    <div class="card">
        <div class="card-body">
            <h2 class="card-title">{{ $item['product'] }}</h2>
            <p><strong>ID:</strong> {{ $item['id'] }}</p>
            <p><strong>Brand:</strong> {{ $item['brand'] }}</p>
            <p><strong>Category:</strong> {{ $item->category->name }}</p>
            <p><strong>Price:</strong> ₱{{ $item['price'] }}</p>

            <a href="{{ route('skincare.index') }}" class="btn btn-primary">Back to Skincare List</a>
        </div>
    </div>

@endsection
