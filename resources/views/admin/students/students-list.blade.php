@foreach ($students as $student)
    <p><strong>Name: </strong>{{ $student->first_name }} {{ $student->last_name }}</p>
    <a href="/admin/user/edit/{{ $student->id }}">Edit</a>
    <hr>
@endforeach