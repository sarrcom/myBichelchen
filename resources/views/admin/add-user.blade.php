@include('templates.scripts')

<form method="POST">
    @csrf
    @method('POST')
    <input type="text" name="first_name" placeholder="First Name">
    <input type="text" name="last_name" placeholder="Last Name">
    <input type="date" name="date_of_birth">
    <select name="role" id="role">
        <option value="Student">Student</option>
        <option value="Teacher">Teacher</option>
        <option value="Guardian">Guardian</option>
        <option value="MaRe">MaRe</option>
    </select>
    <select name="klass" id="klass">
        @foreach($klasses as $klass)
            <option value="{{ $klass->id }}">{{ $klass->name }}</option>
        @endforeach
    </select>
    <input type="submit" name="submit" value="SAVE">
</form>
<script>
    $('#role option').click(function(e) {
        if (this.value == "Student") {
            $('#klass').css("display", "initial");
            console.log(this.value);

        } else {
            $('#klass').css("display", "none");
            console.log(this.value);
        }
    })
</script>
