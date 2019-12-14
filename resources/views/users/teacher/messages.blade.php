@extends('templates.main')
@section('title', 'Teacher Messages')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')
<!-- teacher-messages
<br>
{{$user->first_name}}

<br>
@foreach ($user->students as $student)
    {{$student->first_name}} <br>
@endforeach -->

<h1 class="d-flex justify-content-center">Messages</h1>
<div class="d-flex justify-content-center">
    <p class="h5 text-primary createShowP">{{date("l")}}, {{date("d/m/Y")}}</p>
    <br><br><br>
</div>

<div class="container">
    <div class="card winter-neva-gradient chat-room">
        <div class="card-body">
            <!-- Messages List -->
            <!-- Grid row -->
            <div class="row px-lg-2 px-2">

            <!-- Grid column -->
            <div class="col-md-6 col-xl-4 px-0">

                <h6 class="font-weight-bold mb-3 text-center text-lg-left">Inbox</h6>
                <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
                    <!-- All Messages -->
                    <ul id="allMessages" class="list-unstyled friend-list">
                        <!-- Chat box -->
                        <li class="active grey lighten-3 p-2">
                            <a href="#" class="d-flex justify-content-between">
                            <img src="https://image.flaticon.com/icons/png/512/145/145842.png" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                            <div class="text-small">
                                <strong>Sebastian McLloyd</strong>
                                <p class="last-message text-muted">
                                    Hello, Are you there?
                                </p>
                            </div>
                            <div class="chat-footer">
                                <p class="text-smaller text-muted mb-0">Just now</p>
                                <span class="badge badge-danger float-right">1</span>
                            </div>  
                            </a>
                        </li>
                        <!-- /Chat box -->

                        <!-- Chat box -->
                        <li class="p-2">
                            <a href="#" class="d-flex justify-content-between">
                            <img src="https://image.flaticon.com/icons/png/512/145/145844.png" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                                <div class="text-small">
                                    <strong>Elaine Kim</strong>
                                    <p class="last-message text-muted">
                                        Am I in the Matrix?
                                    </p>
                                </div>
                                <div class="chat-footer">
                                    <p class="text-smaller text-muted mb-0">5 min ago</p>
                                    <span class="text-muted float-right"><i class="fas fa-mail-reply" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </li>
                        <!-- /Chat box -->
                    </ul>
                    <!-- /All Messages -->
                </div>

            </div>
            <!-- Grid column -->
            <!-- /Messages List -->

            <!-- Selected Message -->
            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">
                <h6 class="font-weight-bold mb-3 text-center text-lg-left"><label for="sendTo">Send To: </label></h6>
                <ul class="list-unstyled chat">
            <li class="d-flex justify-content-between mb-4">
              <img src="https://image.flaticon.com/icons/png/512/145/145843.png" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                  <strong class="primary-font">Marius Dobreanu</strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i> 14 mins ago</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  Hello, how many pages does my son have to write for his homework today?
                </p>
              </div>
            </li>

            <li class="d-flex justify-content-between mb-4">
              <div class="chat-body white p-3 z-depth-1">
                <div class="header">
                  <strong class="primary-font">Sebastian McLloyd</strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i> 13 mins ago</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  Just the three as I have mentioned in the notes, please make sure he goes over the extra classes I've assigned for him.
                </p>
              </div>
              <img src="https://image.flaticon.com/icons/png/512/145/145842.png" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
            </li>

            <li class="d-flex justify-content-between mb-4 pb-3">
              <img src="https://image.flaticon.com/icons/png/512/145/145843.png" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
              <div class="chat-body white p-3 ml-2 z-depth-1">
                <div class="header">
                  <strong class="primary-font">Marius Dobreanu</strong>
                  <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                </div>
                <hr class="w-100">
                <p class="mb-0">
                  No problem at all!
                </p>
              </div>
            </li>

            <li class="white">
                <!-- Send Message -->
                <div class="chat-body white p-3 z-depth-1">
                    
                        <form method="POST" id="sendMessageForm">
                            @csrf
                            @method('POST')
                            
                            <input type="radio" name="sendTo" value="class" checked>Class
                            <input type="radio" name="sendTo" value="student">One Student<br>
                            
                            <label for="recipient">Recipient</label>
                            
                            {{-- options from script based on the radio: classes or students--}}
                            <select name="recipient" id="recipient" required>
                            </select><br>
                                
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" required><br>
                            
                        </form>
                    <div class="form-group basic-textarea">
                        <textarea name="description" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..." required></textarea>
                    </div>
                </div>
            </li>
                <button type="submit" class="btn btn-info btn-rounded btn-sm waves-effect waves-light float-right" name="submitHomework">Send</button>

                </div>
            </div>
            <!-- Grid column -->
            <!-- Selected Message -->
        </div>
        <!-- Grid row -->
        
        </div>
    </div>
</div>
<!-- https://www.flaticon.com/packs/avatar-set -->
<div class="text-center">Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
@endsection

@section('footer')
@include('templates.footer')
@endsection

<!-- <form method="POST" id="sendMessageForm">
    @csrf
    @method('POST')
    
    <label for="sendTo">Send To</label>
    <input type="radio" name="sendTo" value="class" checked>Class
    <input type="radio" name="sendTo" value="student">One Student<br>
    
    <label for="recipient">Recipient</label>
    
    {{-- options from script based on the radio: classes or students--}}
    <select name="recipient" id="recipient" required>
    </select><br>
        
    <label for="subject">Subject</label>
    <input type="text" name="subject" required><br>
    <textarea name="description" id="" cols="30" rows="10" required></textarea><br>
    

    
    <input type="submit" name="submitHomework" value="Submit">
</form>
-->

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
