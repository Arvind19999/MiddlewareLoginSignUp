<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Registration</h1>
        <hr>
        <form action="{{ url('/user/register') }}" method="POST">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fails'))
                <div class="alert alert-danger">{{ Session::get('fails') }}</div>
            @endif
            <div class="form-group">
              <label for="name">User Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" aria-describedby="helpId" value='{{ old('name') }}'>
              <span class="text-danger">@error('name') {{ $message }}@enderror </span>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Your Email" aria-describedby="helpId" value='{{ old('email') }}'>
                <span class="text-danger">@error('email') {{ $message }}@enderror </span>
              </div>
            
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password" aria-describedby="helpId">
                <span class="text-danger">@error('password') {{ $message }}@enderror </span>
              </div>
            
              <button type="submit" class="btn btn-primary">Register</button>
        </form>
        <span>Already have an Account !!!</span> <a href="/login">Login In</a>
      </div>  
  </body>
</html>