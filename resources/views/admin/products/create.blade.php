<!-- resources/views/admin/products/create.blade.php -->

@extends('admin.layout')

@section('title', 'Add Product')

@section('content')
<div class="center-container">
    <h1 style="font-family: 'Vollkorn', serif;
    font-size: 40px;
    color:black;text-align:center">Add Product</h1>

    <form class="form-container" method="post" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf

        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="description">Product Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="price">Product Price:</label>
        <input type="number" id="price" name="price" required><br>

        <label for="stock">Product Stock:</label>
        <input type="number" id="stock" name="stock" required><br>

        <label for="image">Product Image:</label>
        <input type="file" id="image" name="image" accept="image/*" required><br>

        <div id="imagePreview" style="display: none;">
            <img id="preview" style="max-width: 200px; max-height: 200px; margin-top: 10px;" alt="Product Image Preview">
        </div>

            
        <br>

        <button type="submit" style="background-color: black; color: white; border-radius: 20px; padding: 20px; font-family: 'Vollkorn', serif; margin-left: auto; margin-right: auto; display: block;">
            Save
        </button><br>
    </form>

    <br>

    <a style="color: black; text-decoration: underline; font-weight: bold; display: block;text-align:center" href="{{ route('admin.products.manageproducts') }}">
        Back to Product List
    </a>
</div>

<script>
    function previewImage() {
        var input = document.getElementById('image');
        var preview = document.getElementById('preview');
        var imagePreview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);

            // Show the image preview container
            imagePreview.style.display = 'block';
        }
    }
</script>
@endsection
