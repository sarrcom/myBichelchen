<!-- maRe-messages
<br>
{{$user->first_name}}

<br>
@foreach ($user->students as $student)
    {{$student->first_name}} <br>
@endforeach -->

@extends('templates.main')
@section('title', 'Maison Relais | Messages')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')
<h1 class="d-flex justify-content-center">Messages</h1>
<div class="d-flex justify-content-center">
    <p class="h5 text-primary createShowP">{{date("l")}}, {{date("d/m/Y")}}</p>
    <br><br><br>
</div>
<div class="container">
    <div class="card deep-blue-gradient chat-room">
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
                            <!-- Inbox Box active grey -->
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
                            <!-- /Inbox Box -->
                            <!-- Inbox Box -->
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
                            <!-- /Inbox Box -->
                        </ul>
                        <!-- /All Messages -->
                    </div>
                </div>
                <!-- Grid column -->
                <!-- /Messages List -->
                <!-- Selected Message -->
                <!-- Grid column -->
                <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">
                    <ul class="list-unstyled chat">
                        <!-- Chat Box -->
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
                        <!-- /Chat Box -->
                        <!-- Chat Box -->
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
                        <!-- /Chat Box -->
                        <!-- Chat Box -->
                        <li class="d-flex justify-content-between mb-4 pb-3">
                            <img src="https://image.flaticon.com/icons/png/512/145/145843.png" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">Marius Dobreanu</strong>
                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                                </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                    No problem at all! Are we still on for the teacher parent meetup? I'm not sure I am going to be able to make it as my schedule is not free this Friday.
                                </p>
                            </div>
                        </li>
                        <!-- /Chat Box -->
                    </ul>
                    <!-- Send Message -->
                    <form id="sendMessageForm">
                        @csrf
                        <div class="chat-body white p-3 z-depth-1">
                            <label for="recipient">To the Teacher of</label>
                            {{-- options from script based on the radio: classes or students--}}
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required><br>
                            <div class="form-group basic-textarea">
                                <textarea name="description" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..." required></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-blue btn-rounded btn-sm waves-effect waves-light float-right" name="submitHomework">Send</button>
                    </form>
                </div>
                <!-- Grid column -->
                <!-- Selected Message -->
            </div>
        <!-- Grid row -->
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('templates.footer')
@endsection

@section('extra-scripts')
<script>


    showMessages();
    function showMessages() {
        requestMessages();
    }

    $(function(){
        $('button[type="submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/user/messages',
                type: 'post',
                data: $('#sendMessageForm').serialize(),
                success: function(result){
                    console.log(result);
                    showMessages();
                },
                error: function(err){
                    console.log('error')
                }
            });
        });
    });

    function requestMessages() {
    $.ajax({
        url: '/user/messages/' + {{ $user->id }},
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
@endsection
