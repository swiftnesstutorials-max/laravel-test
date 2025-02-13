
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
  
    <form>
        <input type="text" name="search" placeholder="Search">
        <input type="submit">
    </form>
    @if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
  @if(Session::has('update'))
<div class="alert alert-success">
    {{Session::get('update')}}
</div>
@endif
<table class="table">
    <a href="{{route('student.create')}}">Add Student</a>
    <h1>All Students</h1>
    <thead>
   <tr> 
    <th>Id</th>
    <th>Name</th>
     <th>email</th>
      <th>Class</th>
      <th>Subjects</th>
       <th>Phone</th>
    <th>Action</th>
   </tr>
    </thead>
    <tbody>
       
        @foreach($students as $student)
        
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->level->name}}</td>
            <td>
                @foreach($student->subjects as $subject)
                {{$subject->name}}
                @endforeach
            </td>
            <td>{{$student->phone}}</td>
            <td>
                <a  href="{{route('student.edit',['student'=>$student])}}">Edit</a>
                <form action="{{route('student.destroy',['id'=>$student->id])}}" method="post">
                    @csrf
                   <button class="btn btn-default" type="submit">Delete</button>
                   <input type="hidden" name="_method" value="delete">
                </form>
            </td>
        </tr>
        @endforeach
     
    </tbody>
</table>
 @php
   //dd($students->getOptions())
   $totalPage=$students->lastPage();
   @endphp
@for($i=1;$i<=$totalPage;$i++)
<a href="{{$students->getOptions()['path'] . '?' . $students->getOptions()['pageName'] . '='. $i}}">{{$i}}</a>
@endfor
</body>
</html>
