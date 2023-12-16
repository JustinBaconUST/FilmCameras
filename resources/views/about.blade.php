<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Film Cameras</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/aboutus/damarota-blog.css') }}">

</head>

<style>
  .txt_field label {
    font-family: sans-serif;
  }
  .center {
    font-family: sans-serif;
    color: black;
  }

  header {
            text-align: center;
            padding: 100px 0; /* Adjust the padding as needed */
            background-image: url('path/to/your/background-image.jpg'); /* Set the path to your background image */
            background-size: cover;
            color: white; /* Set the text color to contrast with the background */
        }

        h1 {
            font-size: 3em;
            margin-bottom: 10px;
            text-align: center; /* Center the text within the h1 element */
        }


</style>

</head>
<body>
@include('header')


<section>
    <h1 style="padding-top:80px;">About Us</span></h1>

    <div class="container">
        <div class="row">
            <div style='margin-top: 90px;'class="col-md-6">
                <div class="image-container">
                    <video width="600" height="500" autoplay loop muted playsinline class="aboutus-img" clip-path="url(#circleView)">
                        <source src="aboutus/video/1.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>            </div>
            </div>
           
            <div style='margin-top: 90px;' class="col-md-6">
               
                <p class="mb-4">
                    Welcome to Film Cameras, where our passion for photography meets the timeless art of film capture. Nestled at the intersection of nostalgia and innovation, we are dedicated to preserving the magic of analog photography in a digital age.
                </p>

                <p class="mb-4">
                    At Film Cameras, we curate a collection of exquisite film cameras, each with its own unique story to tell. Our journey began with a shared love for the tactile experience of film photography—the click of the shutter, the anticipation of developing film, and the joy of holding a tangible memory in your hands.
                </p>

                <p class="mb-4">
                    As avid photographers ourselves, we understand the profound connection between a photographer and their camera. Our mission is to provide a platform for enthusiasts, beginners, and seasoned professionals alike to discover, acquire, and cherish these iconic pieces of photographic history.
                </p>


            </div>
        </div>
    </div>
</section>
