
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
 
  <h1>EDIT CLASS</h1>
<form action="{{route('level.update',['level'=>$level])}}" method="post">
  @csrf

    <div class="mb-3">
    <label for="pwd" class="form-label">Name:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter password" name="name" value="{{$level->name}}">
  </div>
  
  <input type="submit" value="Add Class" class="btn btn-primary">
</form>
</div>



</body>
</html>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach

