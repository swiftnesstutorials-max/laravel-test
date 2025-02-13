
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
    @if(Session::has('success'))
    <div class="alert alert-success">
        {{Session::get('success')}}
    </div>
    @endif
    <div class="card-body">
    @if(Session::has('delete'))
    <div class="alert alert-success">
        {{Session::get('delete')}}
    </div>
    @endif
  <h1>CLASS</h1>
<form action="{{route('level.store')}}" method="post">
  @csrf

    <div class="mb-3">
    <label for="pwd" class="form-label">Name:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter password" name="name" value="{{old('name')}}">
    @error('name')
    {{$message}}
    @enderror
  </div>
  
  <input type="submit" value="Add Class" class="btn btn-primary">
</form>
</div>

<table class="table">
    <h1>All Class</h1>
    <thead>
   <tr> 
    <th>Name</th>
    <th>Action</th>
   </tr>
    </thead>
    <tbody>
       
        @foreach($levels as $level)
        <tr>
            <td>{{$level->name}}</td>
            <td>
                <a class="btn btn-default" href="{{route('level.edit',['id'=>$level->id])}}" style="float: left;">Edit</a>
                <form action="{{route('level.destroy',['level'=>$level])}}" method="post">
                    @csrf
                <button class="btn btn-default" type="submit">Delete</button>
                <input type="hidden" name="_method" value="delete" />
                </form>
            </td>
        </tr>
        @endforeach
       
    </tbody>
</table>

</body>
</html>
{{-- 
@foreach($errors->all() as $error)
<li>{{$error}}</li>
@endforeach
--}}

