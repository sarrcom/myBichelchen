<a href="/users/create">ADD</a>
<hr>

@foreach ($users as $user)
    <p><strong>Name: </strong>{{ $user->first_name }} {{ $user->last_name }}</p>
    <p><strong>Username: </strong>{{ $user->username }}</p>
    <p><strong>Role: </strong>{{ $user->role }}</p>
    <a href="/users/{{ $user->id }}/edit">Edit</a>
    <form action="/users/{{ $user->id }}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="DELETE">
    </form>
    <hr>
@endforeach