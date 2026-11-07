@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
    <h2>500 - Server Error</h2>

    <p>Something went wrong on our server. Our team will work to resolve the issue.</p>

    <a href="{{ route('skincare.index') }}" class="btn btn-primary">
        Back to the list
    </a>
@endsection