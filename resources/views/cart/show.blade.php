<!-- resources/views/cart/show.blade.php -->

<html>

<head>
    <meta charset="utf-8">
    <title>Shopping Cart</title>
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:700italic,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Lato', sans-serif;
            color: black;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }

        h1 {
            font-family: 'Vollkorn', serif;
            font-weight: 800;
            font-size: 30px;
            text-align: center;
            margin-top: 30px;
        }

        .cart-container {
            background-color: #f8f9fa;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
        }

        .cart-product-img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .card-top-part {
            display: flex;
            justify-content: space-between;
        }

        .cart-product-container {
            display: flex;
            margin-right: 20px;
        }

        .cart-product-details {
            flex: 1;
            padding: 0 10px;
        }

        .cart-product-name {
            margin-top: 0;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: 700;
        }

        .cart-product-price {
            font-size: 18px;
        }

        .cart-cta-container {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .checkout-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .checkout-table {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .checkout-table td {
            padding: 10px;
        }

        .checkout-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    @include('header')

    <div class="container">
        <h1>Shopping Cart</h1>

        @forelse($cartItems as $item)
        <div class="cart-container">
            <div class="card-top-part">
                <div class="cart-product-container">
                    <div class="cart-product-img">
                        <img src="{{ asset($item->product->image) }}" class="img-fluid"
                            alt="{{ $item->product->name }}">
                    </div>

                    <div class="cart-product-details">
                        <div class="cart-product-wrapper">
                            <div class="cart-product-name">
                                <p>{{ $item->product->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cart-product-details">
                    <div class="cart-product-wrapper">
                        <div class="item heading">
                            <p>Each</p>
                        </div>
                        <div class="cart-product-item-price">
                            <p>Php {{ $item->product->price }}</p>
                        </div>
                    </div>
                </div>

                <div class="cart-product-details">
                    <div class="cart-product-wrapper">
                        <div class="Quantity heading">
                            <p>Quantity</p>
                        </div>
                        <div class="cart-product-quantity">
                            <select class="form-control">
                                <option>{{ $item->quantity }}</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="cart-product-details">
                    <div class="cart-product-wrapper total-price">
                        <div class="total heading">
                            <p>Total</p>
                        </div>
                        <div class="cart-product-price">
                            <p>Php {{ $item->product->price * $item->quantity }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-cta-container">
                <form action="{{ route('cart.remove', ['itemId' => $item->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </form>

                <form action="{{ route('cart.moveToLikes', ['itemId' => $item->id]) }}" method="post">
                    @csrf
                    <button type="submit">
                        <i class="fas fa-heart fa-fw"></i> Move to Wishlist
                    </button>
                </form>
            </div>
            @empty
            <p style="margin-top:40px">Your cart is empty.</p>
            @endforelse

            <div class="checkout-container">
                <table class="table checkout-table">
                    <tbody>
                        <tr>
                            <td>Shipping cost</td>
                            <td>TBD</td>
                        </tr>
                        <tr>
                            <td><strong>Estimated Total</strong></td>
                            <td><strong>-</strong></td>
                        </tr>
                    </tbody>
                </table>
                <a href="#" class="checkout-btn"><i class="fas fa-arrow-right"></i> Proceed to Checkout</a>
            </div>
        </div>
        <div class="prodcard" style="margin-top:100px">
            @if(session('success'))
            <div
                style="font-size:20px;color:white;background-color: rgba(0, 230, 50, 0.9);margin-top:-500px;padding:20px;border-radius:30px;">
                {{ session('success') }}
            </div>
            @elseif(session('info'))
            <div
                style="font-size:20px;color:white;background-color: rgba(230, 0, 50, 0.9);margin-top:-500px;padding:20px;border-radius:30px;">
                {{ session('info') }}
            </div>
            @endif
        </div>
</body>

</html>