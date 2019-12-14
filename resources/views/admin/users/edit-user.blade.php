@php ($roles = ['Teacher', 'Guardian', 'MaRe'])

<form method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
    <input type="text" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
    <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}">
    <select name="role" class="form-control input-md" required>
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
