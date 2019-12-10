@php ($roles = ['Student', 'Teacher', 'Guardian', 'MaRe'])

<form method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
    <input type="text" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
    <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}">
    <select name="role">
        @foreach($roles as $role)
            @if($user->role == $role)
                <option value="{{ $role }}" selected>{{ $role }}</option>
            @else
                <option value="{{ $role }}">{{ $role }}</option>
            @endif
        @endforeach
    </select>
    <input type="submit" value="SAVE">
</form>
<form action="/admin/user/{{ $user->id }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="DELETE">
</form>
