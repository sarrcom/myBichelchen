@extends('templates.main')
@section('title', 'Overview')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')

teacher-overview
<br>
{{$user->first_name}}

<br>
@foreach ($user->students as $student)
    {{$student->first_name}} <br>
@endforeach
@endsection

@section('footer')
@include('templates.footer')
@endsection
