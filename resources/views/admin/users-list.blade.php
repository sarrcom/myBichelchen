@foreach ($users as $user)
    <p><strong>Name: </strong>{{ $user->first_name }} {{ $user->last_name }}</p>
    <p><strong>Username: </strong>{{ $user->username }}</p>
    <p><strong>Role: </strong>{{ $user->role }}</p>
    <hr>
@endforeach

