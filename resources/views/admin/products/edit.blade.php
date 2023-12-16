<!-- resources/views/products/edit.blade.php -->

@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')
<div class="center-container">
    <h1 style="font-family: 'Vollkorn', serif; font-size: 40px; color: black; text-align: center;">Edit Product</h1>

    <form class="form-container" method="post" action="{{ route('admin.products.update', ['id' => $product->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}" required><br>

        <label for="price">Product Price:</label>
        <input type="number" id="price" name="price" value="{{ $product->price }}" required><br>

        <label for="stock">Product Stock:</label>
        <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required><br>

        <label for="description">Product Description:</label>
        <textarea id="description" name="description" required>{{ $product->description }}</textarea><br>

          <!-- Display current image -->
          <label for="current_image">Current Product Image:</label>
        @if($product->image)
            <img id="current_image" src="{{ asset($product->image) }}" alt="Current Product Image" style="max-width: 200px; max-height: 200px;">
        @else
            No Image
        @endif
        <br>

        <!-- Allow user to upload a new image -->
        <label for="new_image">New Product Image (optional):</label>
        <input type="file" id="new_image" name="new_image" accept="image/*" onchange="previewImage(this)"><br>
        <img id="preview" src="#" alt="New Product Image Preview" style="max-width: 200px; max-height: 200px; display: none;">

        <br>

        <button type="submit" style="background-color: black; color: white; border-radius: 20px; padding: 20px; font-family: 'Vollkorn', serif; margin-left: auto; margin-right: auto; display: block;">
            <i class="fa fa-floppy-o" aria-hidden="true"></i> Update
        </button>
    </form>

    <br>

    <a style="color: black; text-decoration: underline; font-weight: bold; display: block; text-align: center;" href="{{ route('admin.products.show', ['id' => $product->id]) }}">
        Back to Product List
    </a>
</div>

<script>
    function previewImage(input) {
        var preview = document.getElementById('preview');
        var currentImage = document.getElementById('current_image');
        
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                currentImage.style.display = 'none';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '#';
            preview.style.display = 'none';
            currentImage.style.display = 'block';
        }
    }
</script>
@endsection

