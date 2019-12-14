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

<button id="previous">previous</button> <button id="next">next</button>

<div class="homeworkcalendar">

</div>

    @include('templates.scripts')
<script>
    let page = 0

    changeRecipient();
    showTables();
    $('#previous').click(previous);
    $('#next').click(next);
    $('[name=sendTo]').click(changeRecipient);


    //show the date of the tables from today and the next 5 schooldays;
    //by clicking the buttomn and changing the page variable you can scroll 5 schooldays back/forward
    function showTables(){
        $(".homeworkcalendar").empty();

        for (let i = 0; i < 7; i++) {

            let timeStamp = new Date().getTime()+((7*page+i)*24*3600*1000);
            let date = new Date(timeStamp);
            
            let day = date.getDay();
            let year;
            let month;
            let dayOf;
            let dateformated;
            let divWithID;
            let ulID

            if (day != 6 && day != 0) {
                year = date.getFullYear();
                month = date.getMonth()+1;
                dayOf = date.getDate();
                dateformated= year+'-'+month+'-'+dayOf;
                
                divWithID ='<div id="d'+dateformated+'"></div>'
                ulID ='<ul id="ul'+dateformated+'"></ul>'
                $(".homeworkcalendar").append(divWithID);
                $('#d'+dateformated).append(dateformated);
                $('#d'+dateformated).append(ulID);
                requestHomework(dateformated);     
            }
        }
    }
    

    function previous(){
        page -= 1;
        showTables();
    }

    function next(){
        page += 1;
        showTables();
    }

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


// submit homework to the server
    $(function(){
        $('input[type="submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/user/homework',
                type: 'post',
                data: $('#homeworkForm').serialize(),
                success: function(result){
                    console.log(result);
                    if (result === 'submitted'){
                        $('#status').html('Homework submitted');
                        showTables()
                    }else {
                        $('#status').html('Recipient cannot be '+ result);
                    }
                    

                },
                error: function(err){
                    console.log('error')
                }
            });
        });
    });

// request homwork for a specific day
function requestHomework(date) {   
    $.ajax({
        url: '/user/homework/'+date,
        type: 'get',
        success: function(result){            
                console.log(result);
                let listItem;
                let content;
                $('#ul'+date).empty();
                for(homework of result){
                content = homework.subject;
                listItem = $('<li></li>');
                listItem.text(content);
                
                $('#ul'+date).append(listItem);    
                }  
        },
        error: function(err){
            console.log(err)
        }
    });
}   


</script>
