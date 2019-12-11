teacher-homework
<br>
{{$user->first_name}}
<br>

<form method="POST">
    <label for="subject">Subject</label>
    <input type="text" name="subject"><br>
    <label for="">To</label>
    <select name="recipient" id="">
        @foreach ($user->klasses as $klass)
            <option value="{{$klass->id}}">{{$klass->name}}</option>
            @foreach ($klass->students as $student)
                <option value="">{{$student->first_name}} {{$student->last_name}}</option>
            @endforeach
        @endforeach

    </select><br>
    <textarea name="description" id="" cols="30" rows="10"></textarea><br>
    <label for="duedate">Due date:</label>
    <input type="date" name="dueDate"><br>
    <input hidden value="Homework">
    <input type="submit" name="submitHomework" value="Submit">

</form>
<option value=""></option>