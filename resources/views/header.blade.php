<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/x-icon" href="favicon/favicon.ico">

    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:700italic,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<header>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <a href="home" class="logo">
                    <i class="fas fa-camera-retro fa-fw"></i>
                    <em>Film</em><strong>Cameras</strong>
                </a>
            </div>
            <div class="col-md-6">
                <nav>
                    <ul class="nav justify-content-end">
                        <li class="nav-item"><a class="nav-link" href="{{ route('products') }}">Cameras</a></li>
                        <li class="nav-item"><a class="nav-link" href="about">About</a></li>

                        @auth
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" id="userDropdown" data-toggle="dropdown"
                                aria-haspopup="true" style="padding-top:2px; margin-bottom:-10px;"
                                aria-expanded="false">
                                <img src="{{ auth()->user()->profileIMG }}" alt="User Avatar" width="32" height="32"
                                    class="rounded-circle">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" style="pointer-events: none;">{{
                                    auth()->user()->username }}</a>
                                <a class="dropdown-item" href="/accountsetting">{{ __('Account Settings') }}</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Sign out') }}</button>
                                </form>
                            </div>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('cart.show') }}"><i
                                    class="fas fa-shopping-cart fa-fw"></i></a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('wishlist.show') }}"><i
                                    class="fas fa-heart fa-fw"></i></a></li>
                        @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>

</html>