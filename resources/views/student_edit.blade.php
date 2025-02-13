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
  <h1>Student Form</h1>
<form action="{{route('student.update',['student'=>$student])}}" method="POST">
  @csrf
   <div class="mb-3">
    <label for="pwd" class="form-label">Class:</label>
    <select id="level" name="level_id">
      <option>Select class</option>
      @foreach($levels as $level)
      <option value="{{$level->id}}" @if($level->id==$student->level->id)
      selected @endif>{{$level->name}}</option>
      @endforeach
      
    </select>
     @error('level')
    {{$message}}
    @enderror
   </div>
	<div class="mb-3">
    <label for="pwd" class="form-label">Name:</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name" name="name" value="{{$student->name}}">
    @error('name')
    {{$message}}
    @enderror
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Email:</label>
    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" name="email" value="{{$student->email}}">
     @error('email')
    {{$message}}
    @enderror
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Phone:</label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="email" placeholder="Enter phone" name="phone" value="{{$student->phone}}">
    @error('phone')
    {{$message}}
    @enderror
  </div>
  <div class="mb-3 mt-3">
    <label for="email" class="form-label">Subject:</label>
    @foreach($subjects as $subject)
    <input type="checkbox" value="{{$subject->id}}" id="subject" name="subjects[]"
    @foreach($student->subjects as $sssubject)
    @if($subject->id==$sssubject->id) checked @endif
    @endforeach/>
    {{$subject->name}}
    @endforeach
  </div>
  <input type="submit" value="Submit" class="btn btn-primary">
</form>
</body>
</html>
