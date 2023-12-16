<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Film Cameras</title>

</head>

<body>
    @include('header')
    <section>
        <br>
        <h1>Welcome to <em>Film Camera</em></h1>
        <p>Capturing Moments, One Frame at a Time.</p>
        <form action="{{ route('products') }}">

            <button type="submit" class="prodbutton">
                View Cameras
            </button>
        </form>
    </section>
</body>

</html>