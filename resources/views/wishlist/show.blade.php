<html>

<head>

</head>

<body>

    @include('header')

    <section class="products">
    </section>

    <h1
        style="text-align:center;color:black;margin-top:30px;margin-bottom:-20px;font-size:40px;font-family: 'Vollkorn', serif;">
        Your Wishlist</h1>

    <div class="prodcard">
        @forelse($wishlistItems as $wishlistItem)
        <div id="card" style="margin:40px">
            <img src="{{ asset($wishlistItem->product->image) }}" alt="{{ $wishlistItem->product->name }}"
                class="product-image">
            <div id="content">
                <h3 style="font-family:Arial, Helvetica, sans-serif;font-size:20px">{{ $wishlistItem->product->name }}
                </h3>
                <h3
                    style="font-family:Arial, Helvetica, sans-serif;font-size:20px;color:rgb(122, 6, 28);margin-top:-10px">
                    <strong>Php {{ $wishlistItem->product->price }}</strong>
                </h3>

                <ul>
                    <li>{{ $wishlistItem->product->description }}</li>
                </ul>

                <div id="price">
                    <form action="{{ route('wishlist.remove', ['wishlistItemId' => $wishlistItem->id]) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background-color: rgb(191, 38, 38);">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <p style="margin-top:40px">Your wishlist is empty.</p>
        @endforelse
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