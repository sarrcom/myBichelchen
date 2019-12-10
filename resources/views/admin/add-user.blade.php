<form>
    @csrf
    @method('POST')
    <input type="text" name="first_name" placeholder="First Name">
    <input type="text" name="last_name" placeholder="Last Name">
    <input type="date" name="date_of_birth">
    <input type="text" name="username" placeholder="username">
    <input type="password" name="password" placeholder="password">
    <select name="role">
        <option value="Teacher">Teacher</option>
        <option value="Guardian">Guardian</option>
        <option value="MaRe">MaRe</option>
    </select>
    <input type="submit" name="submit" value="SAVE">
</form>