@extends('templates.main')
@section('title', 'Teacher Homework')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')

<h1 class="d-flex justify-content-center">Homework</h1>


<div class="container">
    <div class="d-flex justify-content-center">
        <button class="btn btn-purple btn-rounded btn-sm waves-effect waves-light" id="previous"><i class="fas fa-caret-left"></i></button> <button class="btn btn-purple btn-rounded btn-sm waves-effect waves-light" id="next"><i class="fas fa-caret-right"></i></button>
        <p class="h5 text-primary createShowP">
        </p>
        <br><br><br>
    </div>
    <div class="card night-fade-gradient">

        <div class="homeworkcalendar">
        </div>
        
    </div>
</div>

@endsection
<div id="status">
</div>




@include('templates.scripts')
@section('footer')
@include('templates.footer')

<script>
    let page = 0


    showTables();
    $('#previous').click(previous);
    $('#next').click(next);



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


    function fillListOfHomeWork(result, date){
        let listItem;
        $('#ul'+date).empty();
        for(homework of result){
           
            content = homework.subject + ' : ' + homework.description + ' '  + homework.klass_id;
            listItem = $('<li></li>');
            listItem.text(content);
            
            $('#ul'+date).append(listItem);    
        }  
    }


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