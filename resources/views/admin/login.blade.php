<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  @if(Session::has('success'))
  <div class="alert alert-success">
   {{Session::get('success')}}
  </div>
  @endif
  @if(Session::has('error'))
  <div class="alert alert-success">
    {{Session::get('error')}}
  </div>
  @endif
  <h2>Admin Login Form</h2>
  <form action="@if(Route::has('AdminloginStore')) {{route('AdminloginStore')}}@endif" method="post">
    @csrf
    
    <div class="mb-3 mt-3">
      <label for="email">Email:</label>
      <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
      @error('email')
      {{$message}}
      @enderror
    </div>
    <div class="mb-3">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="Enter password" name="password"  value="{{old('password')}}">
       @error('password')
      {{$message}}
      @enderror
    </div>
    
   <input type="submit" value="login" class="btn btn-primary">
  </form>
  <a href="{{route('register')}}">Create new account</a>
</div>
</body>
</html>