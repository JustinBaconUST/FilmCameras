<!-- resources/views/admin/products/manageproducts.blade.php -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@extends('admin.layout')
 
@section('title', 'Manage Products')
 
@section('content')
 
<body>
    <div style="text-align: center;">
<br><br>
        <h1 class="prodh1" style="padding-top:5%"
>Manage Products</h1>
 
        <button type="button" style="background-color:black; color:white; border-radius:50px; padding:20px; font-family: 'Vollkorn', serif;" onclick="window.location='{{ route('admin.products.create') }}';"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Product</button>
 
 
        <table style="width:80%; margin: 20px auto; color:black;">
            <thead>
                <tr style="color:white">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
                @if (!$product->archive) <!-- Check if archive is false -->
                    <tr>
                        <td>
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="Product Image" style="max-width: 100px; max-height: 100px;">
                                @else
                                    No Image
                                @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>Php {{ $product->price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="window.location='{{ route('admin.products.edit', ['id' => $product->id]) }}';">Edit</button>
                            <form method="POST" action="{{ route('admin.products.archive', ['id' => $product->id]) }}" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning">Archive</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
 
 
    </div>
</body>
@endsection
 