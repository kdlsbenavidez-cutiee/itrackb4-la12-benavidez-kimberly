
@extends('layouts.app')

@section('title', 'Create Skincare Product')

@section('content')

    <h2>Add Skincare Product</h2>

    <form method="POST" action="{{ route('skincare.store') }}">
        @csrf

        <div class="mb-3">
            <label for="product">Product</label>
            <input
                type="text"
                name="product"
                id="product"
                class="form-control"
                value="{{ old('product') }}"
            >

            @error('product')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand">Brand</label>
            <input
                type="text"
                name="brand"
                id="brand"
                class="form-control"
                value="{{ old('brand') }}"
            >

            @error('brand')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">Price</label>
            <input
                type="number"
                name="price"
                id="price"
                class="form-control"
                value="{{ old('price') }}"
            >

            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>

        <a href="{{ route('skincare.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>

@endsection
