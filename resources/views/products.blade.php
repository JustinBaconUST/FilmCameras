<!-- resources/views/products.blade.php -->
<html>

<head>
    <meta charset="utf-8">
    <title>Film Cameras</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:700italic,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body>

    @include('header')
    <section class="products">
        <br>
        <h1 class="prodh1">Cameras</h1>
        <button class="prodbutton"> RANGEFINDER</button>
        <button class="prodbutton"> SLR</button>
        <button class="prodbutton"> POINT & SHOOT</button>
    </section>

    <div class="prodcard">
        @foreach($products as $product)
        <div id="card" style="margin:40px">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="product-image">
            <div id="content">
                <h3 style="font-family:Arial, Helvetica, sans-serif;font-size:20px">{{ $product->name }}</h3>
                <h3
                    style="font-family:Arial, Helvetica, sans-serif;font-size:20px;color:rgb(122, 6, 28);margin-top:-10px">
                    <strong>Php {{ $product->price }}</strong>
                </h3>

                <ul>
                    <li>{{ $product->description }}</li>
                    <li><strong>Stock:</strong> {{ $product->stock }}</li>
                </ul>

                <div id="price">

                    <form action="{{ route('cart.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit"
                            style="background-color: rgb(26, 26, 144); color: white; border: none; padding: 5px 10px; border-radius: 5px;">
                            <i class="fas fa-shopping-cart fa-fw"></i>
                        </button>
                    </form>

                    <form action="{{ route('wishlist.add') }}" method="post"
                        onsubmit="return addToWishlist({{ $product->id }});">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" style="background-color: rgb(191, 38, 38);">
                            <i class="fas fa-heart fa-fw"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="prodcard" style="margin-top:100px">
        @if(session('success'))
        <div
            style="font-size:30px;color:white;background-color: rgba(0, 230, 50, 0.9);margin-top:-500px;padding:20px;border-radius:30px;">
            {{ session('success') }}
        </div>
        @elseif(session('info'))
        <div
            style="font-size:30px;color:white;background-color: rgba(230, 0, 50, 0.9);margin-top:-500px;padding:20px;border-radius:30px;">
            {{ session('info') }}
        </div>
        @endif
    </div>
    </section>
</body>