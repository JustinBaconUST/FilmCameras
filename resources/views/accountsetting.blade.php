<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Film Cameras</title>
    <link rel="stylesheet" href="{{ asset('css/accountsetting/ProfilePicture.css') }}">
    <link rel="stylesheet" href="{{ asset('css/accountsetting/PasswordCard.css') }}">
    <link rel="stylesheet" href="/bootstrap/dist/css/bootstrap.min.css">


</head>

<body>
@include('header')
    <section>

        <div class="centered-card-container">
            <!-- Center the cards horizontally -->
    
    
    
    
    
    
    
<!-- CHANGE PASSWORD -->
<div class="centered-card">
    <div class="card text-center custom-card">
        <div class="card-header h5 text-white" style="background-color: black;">Change Password</div>
        <div class="card-body px-4">
            <form method="post" action="{{ route('password.change') }}">
                @csrf
                <div class="form-group">
                    <label for="currentPassword" style="color: black;">Current Password</label>
                    <input type="password" id="currentPassword" name="currentPassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="newPassword" style="color: black;">New Password</label>
                    <input type="password" id="newPassword" name="newPassword" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="confirmPassword" style="color: black;">Confirm Password</label>
                    <input type="password" id="confirmPassword" name="newPassword_confirmation" class="form-control" required>
                </div>
                
                <button type="submit" class="btn btn-dark w-100 custom-button my-3">Confirm</button>
                @error('currentPassword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
                @error('newPassword')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </form>
        </div>
    </div>
</div>


<!-- PROFILE PICTURE -->
<div class="centered-card">
    <div class="card text-center custom-card">
        <div class="card-header h5 text-white" style="background-color: black;">Change Profile Picture</div>
        <div class="card-body px-4">
            <form method="post" action="{{ route('update-profile-picture') }}" enctype="multipart/form-data">
                @csrf
                <div class="profile-pic-div">
                    <img src="{{ auth()->user()->profileIMG }}" id="photo">
                    <input type="file" id="file" name="profileIMG" onchange="loadFile(event)">
                    <label for="file" id="uploadBtn">Choose Photo</label>
                    <script src="/js/ProfilePicture.js"></script>
                </div>
                <button type="submit" class="btn btn-dark w-100 custom-button">Confirm</button>
            </form>
        </div>
    </div>
</div>
            </div>
        </div>  
    </section>
</body>
<script> 
    var loadFile = function (event) {
    var fileInput = document.getElementById("file");
    var image = document.getElementById('photo');

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            image.src = e.target.result;
        }

        reader.readAsDataURL(fileInput.files[0]);
    }
};
    </script>
</html>
