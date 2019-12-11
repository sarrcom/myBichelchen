teacher-homework
<br>
{{$user->first_name}}

<br>

<form method="POST">
    <label for="subject">Subject</label>
    <input type="text" name="subject"><br>
    <select name="reciever" id="">
        @foreach ($user->klasss as $klass)
            
        @endforeach
    </select>
    <textarea name="description" id="" cols="30" rows="10"></textarea><br>
    <label for="duedate">Due date:</label>
    <input type="date" name="dueDate"><br>
    <input hidden value="Homework">
    <input type="submit" name="submitHomework" value="Submit">

</form>