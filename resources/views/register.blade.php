<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="card-body">
  
<form action="@if(Route::has('registerStore')) {{route('registerStore')}}@endif" method="post">
  @csrf

	<div class="mb-3">
    <label for="pwd" class="form-label">Name:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter password" name="name" value="{{old('name')}}">
    @error('name')
    {{$message}}
    @enderror
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{old('email')}}">
    @error('email')
    {{$message}}
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Password:</label>
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="pwd" placeholder="Enter password" name="password">
    @error('password')
    {{$message}}
    @enderror
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Confirm Password:</label>
    <input type="password" class="form-control" id="name" placeholder="Enter password" name="password_confirmation">
  </div>
  <input type="submit" value="Submit" class="btn btn-primary">
</form>
</div>
</body>
</html>
//@foreach($errors->all() as $error)
//<li>{{$error}}</li>
//@endforeach