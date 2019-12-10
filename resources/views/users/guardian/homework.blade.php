guardianHomework
<br>
{{$user->first_name}}

<br>
@foreach ($user->students as $student)
    {{$student->first_name}} <br>
@endforeach