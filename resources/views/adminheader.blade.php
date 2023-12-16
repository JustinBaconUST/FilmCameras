<!-- resources/views/admin/layout.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:700italic,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

</head>
<header>
    <br>
    <a href="" class="logo">
        <i class="fas fa-camera-retro fa-fw"></i>
        <em>Film</em><strong>Cameras</strong>
    </a>
    <nav>
        <ul class="nav">
            <li class="nav-item"><a href="{{ route('admin.products.manageproducts') }}" class="nav-link">Products</a></li>
            <li class="nav-item"><a href="{{ route('manageorders') }}" class="nav-link">Orders</a></li>
            <li class="nav-item"><a href="{{ route('manageusers') }}" class="nav-link">Users</a></li>
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <!-- Use a link instead of a button -->
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">{{ __('Sign out') }}</a>
                </form>
            </li>
        </ul>
    </nav>
</header>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
