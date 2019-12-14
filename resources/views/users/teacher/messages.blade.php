teacher-messages
<br>
{{$user->first_name}}

<form method="POST" id="sendMessageForm">
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
    

    
    <input type="submit" name="submitHomework" value="Submit">
</form>

<ul id="allMessages">
    
</ul>

@include('templates.scripts')
<script>

    changeRecipient();
    $('[name=sendTo]').click(changeRecipient);
    //function to change the selector  of recipient of homework
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
                $(recipient).append(new Option("--{{$klass->name}}--", "seperator"));

                @foreach ($klass->students as $student)
                    $(recipient).append(new Option(" {{$student->first_name}} {{$student->last_name}}", "{{$student->id}}"));
                @endforeach
            @endforeach
        }
        
    }

    showMessages();
    function showMessages() {
        
        requestMessages();
    }


    $(function(){
        $('input[type="submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/user/messages',
                type: 'post',
                data: $('#sendMessageForm').serialize(),
                success: function(result){
                    console.log(result);
                    showMessages() 
                },
                error: function(err){
                    console.log('error')
                }
            });
        });
    });

    
    function requestMessages() {
    $.ajax({
        url: '/user/messages/'+{{$user->id}},
        type: 'get',
        success: function(result){
            console.log(result);
            let listItem;
            let content;
            $('#allMessages').html('');
            for(message of result){
            content = message.subject;
            listItem = $('<li></li>');
            listItem.text(content);
            
            $('#allMessages').append(listItem);    
            }  

        },
        error: function(err){
            console.log(err)
        }
    });
}     

</script>