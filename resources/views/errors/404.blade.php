@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
    <h2>404 - Page Not Found</h2>

    <p>The page you are looking for could not be found.</p>

    <a href="{{ route('skincare.index') }}" class="btn btn-primary">
        Back to the list
    </a>
@endsection