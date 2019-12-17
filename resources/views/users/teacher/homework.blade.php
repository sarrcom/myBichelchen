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

<div class="container">
        <div class="card night-fade-gradient chat-room">

            <div class="card-body">
                <!-- Grid row -->
                <div class="row px-lg-2 px-2">
                    <!-- Grid column -->
                    <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0 mx-auto">

                        <ul class="list-unstyled chat">
                            <!-- Homework Box -->
                            <li class="d-flex justify-content-center">
                                <div class="chat-body white p-3 z-depth-1" style="width: 80vh;">
                                    <div class="header">
                                        <h6 class="font-weight-bold mb-2 text-center text-lg-center">Homework Calendar</h6>

                                        <hr class="w-100">
                                        <!-- Homework Calender -->
                                        <div class="list-unstyled chat-1 scrollbar-light-blue homeworkCalendarList">
                                            <div class="homeworkcalendar">
                                            </div>
                                        </div>
                                        <hr class="w-100">
                                    </div>
                                </div>
                            </li>
                            <!-- /Homework Box -->
                            <li class="d-flex justify-content-center">
                                <button class="btn btn-info btn-rounded btn-sm waves-effect waves-light" id="previous"><i class="fas fa-caret-left"></i></button>
                                <button class="btn btn-info btn-rounded btn-sm waves-effect waves-light" id="next"><i class="fas fa-caret-right"></i></button>
                            </li>
                            <!-- Send Homework -->
                            <div id="status">
                            </div>
                            <form method="POST" id="homeworkForm">
                                @csrf
                                @method('POST')

                                <div class="chat-body white p-3 z-depth-1">


                                    <label for="recipient">To the Parents of</label>

                                    {{-- options from script based on the radio: classes or students--}}
                                    <select name="recipient" id="recipient" required>
                                    </select><br>

                                    <label for="subject">Subject</label>
                                    <input type="text" name="subject" id="subject" required><br>

                                    <div class="form-group basic-textarea">
                                        <textarea name="description" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..." required></textarea>
                                    </div>

                                    <label for="dueDate">Due Date</label>
                                    <input type="date" name="dueDate" id="dueDate" required><br>

                                </div>


                                <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right" name="submitHomework">Send</button>

                            </form>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </div>
@endsection

@include('templates.scripts')
@section('footer')
@include('templates.footer')

<script>
    let page = 0

    changeRecipient();
    showTables();
    $('#previous').click(previous);
    $('#next').click(next);
    $('#customSwitches').click(changeRecipient);

    //show the date of the tables from today and the next 5 schooldays;
    //by clicking the buttomn and changing the page variable you can scroll 5 schooldays back/forward
    function showTables(){
        $(".homeworkcalendar").empty();

        for (let i = 0; i < 7; i++) {

            let timeStamp = new Date().getTime()+((7*page+i)*24*3600*1000);
            let date = new Date(timeStamp);

            let day = date.getDay();
            let dayName;
            if(day==1){
                dayName= 'Monday';
            }
            if(day==2){
                dayName= 'Tuesday';
            }
            if(day==3){
                dayName= 'Wednesday';
            }
            if(day==4){
                dayName= 'Thursday';
            }
            if(day==5){
                dayName= 'Friday';
            }

            let dayOf=date.getDate();
            let year = date.getFullYear();
            let month = date.getMonth()+1;
            let dateformated= year+'-'+month+'-'+dayOf;
            let readableDate= dayOf+'.'+month+'.'+year

            let divWithID;
            let ulID

            if (day != 6 && day != 0) {

                divWithID ='<div id="d'+dateformated+'"></div>'
                ulID ='<ul id="ul'+dateformated+'"></ul>'
                $(".homeworkcalendar").append(divWithID);

                $('#d'+dateformated).append(dayName+' '+readableDate);
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


        if ($('#customSwitches').is(":checked")) {
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

    function fillListOfHomeWork(result, date){
        let listItem;
        $('#ul'+date).empty();
        for(homework of result){

            content = homework.subject + ' : ' + homework.description + ' ' + homework.klass_id;
            listItem = $('<li></li>');
            listItem.text(content);
            $('#ul'+date).append(listItem);
        }
    }

// submit homework to the server
    $(function(){
        $('button[type="submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/user/homework',
                type: 'post',
                data: $('#homeworkForm').serialize(),
                success: function(result){
                    console.log(result);
                    if (result === 'submitted'){
                        $('#status').html('Homework submitted');
                        showTables();
                        $('#recipient').val('');
                        $('#exampleFormControlTextarea2').val('');
                        $('#subject').val('');
                        $('#dueDate').val('');

                    }else {
                        $('#status').html('Recipient cannot be '+ result);
                    }


                },
                error: function(err){
                    console.log(err)
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
                //console.log(result);
                fillListOfHomeWork(result, date)
        },
        error: function(err){
            console.log(err)
        }
    });
}
</script>
@endsection

