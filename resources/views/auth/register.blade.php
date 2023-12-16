<html>

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,700,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Vollkorn:700italic,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<style>

  .txt_field label {
    font-family: sans-serif;
  }
  .center {
    font-family: sans-serif;
    color: black;
  }

  .name_fields {
  display: flex;
  gap: 10px; 
  margin-bottom: -25px;
  margin-top: -25px;
}
.name_fields .txt_field {
  flex: 1;
}
</style>

</head>

<body>

@include('header')

<section>
    <div class="center">
        <h1>SIGNUP</h1>

        <form method="POST" action="{{ route('register') }}">
            @csrf



            <div class="name_fields">
                <div class="txt_field">
                  <input type="text" id="last_name" name="lName" :value="old('last_name')" required>
                  <span></span>
                  <label>Last Name</label>
                  @error('last_name')
                  <span class="text-red-500">{{ $message }}</span>
              @enderror
                </div>

                <div class="txt_field">
                    <input type="text" id="first_name" name="fName" :value="old('first_name')" required>
                    <span></span>
                    <label>First Name</label>
                    @error('first_name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                  </div>
                </div>

                <div class="txt_field">
                    <input id="username" type="text" name="username" :value="old('username')" required>
                    <span></span>
                    <label>Username</label>
                    @error('username')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                  </div>

                  <div class="name_fields">
                    <div class="txt_field">
                      <input id="password" type="password" name="password" required autocomplete="new-password">
                      <span></span>
                      <label>Password</label>
                      @error('password')
                      <span class="text-red-500">{{ $message }}</span>
                  @enderror
                    </div>
                    
                    <div class="txt_field">
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                        <span></span>
                        <label>Confirm Password</label>
                        </div>
                      </div>

                      <div class="txt_field">
                        <input id="email" type="email" name="email" :value="old('email')" required>
                        <span></span>
                        <label>Email</label>
                        @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                      </div>

                      <div class="txt_field">
                        <input  id="phone_number" type="text" name="phoneNumber" :value="old('phone_number')" required >
                        <span></span>
                        <label>Phone Number</label>
                        @error('phone_number')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                      </div>
                      <div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

                <input type="submit" value="{{ __('Register') }}">
            </div>

            <div class="signup_link">
                Already a member? <a href="{{ route('login') }}">Login here.</a>
              </div>
        </form>
    </div>
</section>