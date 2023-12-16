<html>

<head>
    <meta charset="utf-8">
    <title>Register</title>

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

.success-message
{
    padding-top: 10px; 
    padding-top: 10px; 
    padding-bottom: 20px;
}
</style>

</head>

<body>
  @include('header')
    <section>
        <div class="center">
      
            <h1>Success!</h1>
            <form method="get"action="{{route('home')}}">
                <label>Your account has been created</label>
                <div id="success-message" class="success-message">
                    Welcome to <em>Film</em><strong>Cameras</strong>.
                </div>
              <input type="submit" value="Continue">
              <div class="signup_link">
              </div>
            </form>
          </div>
        </section>


    