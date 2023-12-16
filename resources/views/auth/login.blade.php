<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Film Cameras</title>
</head>

<style>
  .txt_field label {
    font-family: sans-serif;
  }
  .center {
    font-family: sans-serif;
    color: black;
  }
</style>

</head>
<body>
@include('header')

<section>
    <div class="center">
        <h1>LOGIN</h1>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            @error('username')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
            <div class="txt_field">
                <input id="username" type="text" name="username" required autofocus autocomplete="username">
                <span></span>
                <label>Username</label>
              </div>
              <div class="txt_field">
                <input id="password" type="password" name="password" required autocomplete="current-password">
                <span></span>
                <label>Password</label>
                @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
              </div>

            <div class="pass">
                <a href="{{ route('password.request') }}">Forgot Password?</a>
            </div>

            <input type="submit" value="{{ __('Login') }}">
            <div class="signup_link">
              Not a member? <a href="{{ route('register') }}">Signup.</a>
            </div>

        </form>
    </div>
</section>