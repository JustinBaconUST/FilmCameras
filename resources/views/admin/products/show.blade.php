<!-- resources/views/products/show.blade.php -->

@extends('admin.layout')

@section('title', 'Edited Product')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Price: ${{ $product->price }}</p>

    <a href="/products/{{ $product->id }}/edit">Edit</a>

    <form method="post" action="/products/{{ $product->id }}" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="/products/manageproducts">Back to Product List</a>
@endsection
