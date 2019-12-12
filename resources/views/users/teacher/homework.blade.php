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
<div id="dayOne">
    <span id="dateOne"></span>
    
</div>

<div id="dayTwo">
    <span id="dateTwo"></span>
    <h3></h3>
    <p></p>
</div>

<div id="dayThree">
   <span id="dateThree"></span>

</div>

<div id="dayFour">
    <span id="dateFour"></span>

</div>

<div id="dayFive">
    <span id="dateFive"></span>

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

        let date1 = $.now();
        date1 += ((5*page)*24*3600*1000);
        let date1formated = getDateFormat(date1)
        $('#dayOne').html(date1formated);
        requestHomework(date1formated);
        
        date1 = $.now();
        date1 += ((5*page+1)*24*3600*1000)
        let date2formated = getDateFormat(date1)
        $('#dayTwo').html(date2formated);
        requestHomework(date2formated);

        date1 = $.now();
        date1 += ((5*page+2)*24*3600*1000)
        let date3formated = getDateFormat(date1)
        $('#dayThree').html(date3formated);
        requestHomework(date3formated);

        date1 = $.now();
        date1 += ((5*page+3)*24*3600*1000)
        let date4formated = getDateFormat(date1)
        $('#dayFour').html(date4formated);
        requestHomework(date4formated);

        date1 = $.now();
        date1 += ((5*page+4)*24*3600*1000)
        let date5formated = getDateFormat(date1)
        $('#dayFive').html(date5formated); 
        requestHomework(date5formated);
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
function requestHomework(date) {
    let url = '/user/showHomework/'+date;
    $.ajax({
        url: url,
        type: 'get',
        success: function(result){
            console.log(result);
        
            

        },
        error: function(err){
            console.log('error')
        }
    });
}   
    

</script>
