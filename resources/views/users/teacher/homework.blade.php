@extends('templates.main')
@section('title', 'Homework')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')

@endsection

@section('footer')
@include('templates.footer')
@endsection
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


    //show the date of the tables from today and the next 3 days;
    //by clicking th buttomn and changing the page variable you can scroll 4 day back/forth
    function showTables(){
        $(".homeworkcalendar").empty();

        for (let i = 0; i < 5; i++) {

            let date = $.now();
            date += ((5*page+i)*24*3600*1000);
            let dateformated = getDateFormat(date);
            let divWithID ='<div id="d'+i+'"></div>'
            $(".homeworkcalendar").append(divWithID);
            $('#d'+i).append(dateformated);       
            requestHomework(dateformated,'#d'+i)

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

    //function to change the selector of recipient of homework
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

    function fillobjects(array, divID){
        for (let index = 0; index < array.length; index++) {
            console.log(array[index].subject);
            
            $(divID).append(array[index].subject)
           }

    }

    function getDateFormat(date) {
        var d = new Date(date),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;
        var date = new Date();
        date.toLocaleDateString();

        return [year, month, day].join('-');
    };



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
function requestHomework(date,divID) {
    let url = '/user/showHomework/'+date;
    $.ajax({
        url: url,
        type: 'get',
        success: function(result){
            console.log(result);
            fillobjects(result,divID)
            

        },
        error: function(err){
            console.log('error')
        }
    });
}   
    

</script>
