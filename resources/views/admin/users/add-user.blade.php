@include('templates.scripts')

<form method="POST">
    @csrf
    @method('POST')
    <input type="text" name="first_name" placeholder="First Name">
    <input type="text" name="last_name" placeholder="Last Name">
    <input type="date" name="date_of_birth">
    <select name="role" id="role">
        <option value="Teacher">Teacher</option>
        <option value="Guardian">Guardian</option>
        <option value="MaRe">MaRe</option>
    </select>
    <p id="addChild" style="cursor: pointer" onmouseover="this.style.textDecoration='underline';" onmouseout="this.style.textDecoration='none';">Add child</p>
    <div id="childs"></div>
    <input type="submit" name="submit" value="SAVE">
</form>
<script>
    $('#addChild').click(function() {
        const child = $("<select></select>");
    });
</script>