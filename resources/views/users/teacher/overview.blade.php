@extends('templates.main')
@section('content')
teacher-overview
<br>
{{$user->first_name}}

<br>
@foreach ($user->students as $student)
    {{$student->first_name}} <br>
@endforeach
@endsection
