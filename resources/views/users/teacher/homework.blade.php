@extends('templates.main')
@section('title', 'Teacher Homework')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')

<h1 class="d-flex justify-content-center">Homework</h1>
<div class="d-flex justify-content-center">
    <p class="h5 text-primary createShowP">{{date("l")}}, {{date("d/m/Y")}}</p>
    <br><br><br>
</div>

<div id="status">
</div>

<form method="POST" id="homeworkForm">
    @csrf
    @method('POST')
    <div class="container">
        <div class="card night-fade-gradient chat-room">

            <div class="card-body">
                <!-- Grid row -->
                <div class="row px-lg-2 px-2">

                    <!-- Grid column -->
                    <div class="col-md-6 col-xl-4 px-0">

                        <h6 class="font-weight-bold mb-3 text-center text-lg-left">Homework Calendar</h6>

                        <button class="btn btn-purple btn-rounded btn-sm waves-effect waves-light" id="previous"><i class="fas fa-caret-left"></i></button> <button class="btn btn-purple btn-rounded btn-sm waves-effect waves-light" id="next"><i class="fas fa-caret-right"></i></button>
                            <!-- Homework Calender -->
                            <div class="homeworkcalendar">
                            </div>
                    </div>
                    <!-- /Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                        <ul class="list-unstyled chat">
                            <!-- Homework Box -->
                            <li class="d-flex justify-content-between mb-4 pb-3">
                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">Homework</strong><br>
                                    <label for="duedate">Due date:</label><br>
                                    <label for="subject">Subject</label>
                                </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                        Write an essay on bananas.
                                    </p>
                                </div>
                            </li>
                            <!-- /Homework Box -->

                            <!-- Send Homework -->
                            <li class="white">
                                <div class="chat-body white p-3 z-depth-1">         
                                    
                                    <label for="duedate">Due date:</label>
                                    <input type="date" name="dueDate" required><br>
                                        
                                    <label for="sendTo">Send To </label>
                                    <input type="radio" name="sendTo" value="class" checked> Class
                                    <input type="radio" name="sendTo" value="student"> One Student<br>

                                    <label for="recipient">Recipient</label>
                                    
                                    {{-- options from script based on the radio: classes or students--}}
                                    <select name="recipient" id="recipient" required>
                                    </select><br>
                                        
                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" required><br>
                                
                                    <div class="form-group basic-textarea">
                                        <textarea name="description" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..." required></textarea>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <button type="submit" class="btn btn-purple btn-rounded btn-sm waves-effect waves-light float-right" name="submitHomework">Send</button>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </div>
    </div>
</form>

@endsection

@section('footer')
@include('templates.footer')
@endsection

<!-- <div id="status">
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
</div> -->
    
@section('footer')
@include('templates.footer')
@endsection

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
