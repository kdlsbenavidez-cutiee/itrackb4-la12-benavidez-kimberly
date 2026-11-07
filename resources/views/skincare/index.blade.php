@extends('layouts.app')

@section('title', 'Skincare Products')

@section('content')

    <h2>Skincare Products</h2>

    <p>
        <a href="{{ route('skincare.create') }}">Add New Product</a>
    </p>

    <h3>Filter by Category:</h3>

    <p>
        <a href="{{ route('skincare.index') }}">All Categories</a>

        @foreach ($categories as $item)
            |
            <a href="{{ route('skincare.index', ['category_id' => $item->id]) }}">
                {{ $item->name }}
            </a>
        @endforeach
    </p>

    <h3>Filter by Brand:</h3>

    <p>
        <a href="{{ route('skincare.index') }}">All Brands</a>
        |
        <a href="{{ route('skincare.index', ['brand' => 'Celeteque']) }}">Celeteque</a>
        |
        <a href="{{ route('skincare.index', ['brand' => 'Belo']) }}">Belo</a>
        |
        <a href="{{ route('skincare.index', ['brand' => 'The Ordinary']) }}">The Ordinary</a>
        |
        <a href="{{ route('skincare.index', ['brand' => 'Luxe Organix']) }}">Luxe Organix</a>
    </p>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Product</th>
                <th>Brand</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($skincare as $item)
                <tr>
                    <td>{{ $item->product }}</td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>₱{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('skincare.show', $item->id) }}">View</a>

                        |

                        <form action="{{ route('skincare.destroy', $item) }}" method="POST"
                              onsubmit="return confirm('Delete this record?')">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No skincare products found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
