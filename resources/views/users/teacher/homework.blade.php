teacher-homework
<br>
{{$user->first_name}} {{$user->last_name}}
<br>

<div id="status">

</div>
<form method="POST" id="homeworkForm">
    @csrf
    @method('POST')
    
    <label for="sendTo">Send To</label>
    <input type="radio" name="sendTo" value="class" checked>Class
    <input type="radio" name="sendTo" value="student">One Student<br>
    
    <label for="recipient">Recipient</label>
    
    {{-- options from script
        based on the radio: classes or students--}}
    <select name="recipient" id="recipient" required>
    </select><br>
        
    <label for="subject">Subject</label>
    <input type="text" name="subject" required><br>
    <textarea name="description" id="" cols="30" rows="10" required></textarea><br>
    
    <label for="duedate">Due date:</label>
    <input type="date" name="dueDate" required><br>
    
    <input type="submit" name="submitHomework" value="Submit">
</form>
    @include('templates.scripts')
<script>

    changeRecipient();
    $('[name=sendTo]').click(changeRecipient);
    
    function changeRecipient(){
        $(recipient).empty();
        let radioSelected = $('input[name=sendTo]:checked').val();
        //console.log(radioSelected);
        
        if (radioSelected == "class") {
            @foreach($user->klasses as $klass)
                $(recipient).append(new Option(" {{$klass->name}}", "{{$klass->id}}"));
            @endforeach
        }else{
            @foreach ($user->klasses as $klass)
                @foreach ($klass->students as $student)
                    $(recipient).append(new Option(" {{$student->first_name}} {{$student->last_name}}", "{{$student->id}}"));
                @endforeach
            @endforeach
        }

    }

    $(function(){
        $('input[type="submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/user/homework',
                type: 'post',
                data: $('#homeworkForm').serialize(),
                success: function(result){
                    console.log(result);
                    if (result === 'submitted') {
                        $('#status').html(result);
                    }else{
                        $('#status').html(result);

                    }

                },
                error: function(err){
                    console.log('error')
                }
            });
        });
    });
</script>
