@extends('templates.main')
@section('title', 'Guardian | Messages')

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

            <!-- Grid row -->
            <div class="row px-lg-2 px-2">

            <!-- Grid column -->
            <div class="col-md-6 col-xl-4 px-0">

                <h6 class="font-weight-bold mb-3 text-center text-lg-left">Inbox</h6>
                <!-- Scroll bar -->
                <div class="white z-depth-1 px-2 pt-3 pb-0 mb-3 members-panel-1 scrollbar-light-blue" id="homeworkList">
                    <ul class="list-unstyled friend-list">
                        <li class="p-2" id="allMessages">
                            <a href="#" class="d-flex justify-content-between">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-8.jpg" alt="avatar" class="avatar rounded-circle d-flex align-self-center mr-2 z-depth-1">
                            <div class="text-small">
                                <strong>John Doe</strong>
                                <p class="last-message text-muted">Hello, Are you there?</p>
                            </div>
                            <div class="chat-footer">
                                <p class="text-smaller text-muted mb-0">Just now</p>
                                <span class="badge badge-danger float-right">1</span>
                            </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                <div class="chat-message">
                    <!-- Scroll bar -->
                    <ul class="list-unstyled chat-1 scrollbar-light-blue">

                        <li class="d-flex justify-content-between mb-4">
                            <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                            <div class="chat-body white p-3 ml-2 z-depth-1">
                                <div class="header">
                                    <strong class="primary-font">Brad Pitt</strong>
                                    <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                                </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                    labore et dolore magna aliqua.
                                </p>
                            </div>
                        </li>

                        <li class="d-flex justify-content-between mb-4">
                        <div class="chat-body white p-3 z-depth-1">
                            <div class="header">
                                <strong class="primary-font">Lara Croft</strong>
                                <small class="pull-right text-muted"><i class="far fa-clock"></i> 13 mins ago</small>
                            </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium.
                            </p>
                        </div>
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="avatar" class="avatar rounded-circle mr-0 ml-3 z-depth-1">
                        </li>

                        <li class="d-flex justify-content-between mb-4">
                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-6.jpg" alt="avatar" class="avatar rounded-circle mr-2 ml-lg-3 ml-0 z-depth-1">
                        <div class="chat-body white p-3 ml-2 z-depth-1">
                            <div class="header">
                                <strong class="primary-font">Brad Pitt</strong>
                                <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins ago</small>
                            </div>
                                <hr class="w-100">
                                <p class="mb-0">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                labore et dolore magna aliqua.
                            </p>
                        </div>
                        </li>
                        <!-- /Chat Box -->
                    </ul>
                    <!-- Send Message -->
                    <form id="sendMessageForm">
                        @csrf
                        <div class="chat-body white p-3 z-depth-1">

                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject" required><br>
                            <div class="form-group basic-textarea">
                                <textarea name="description" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..." required></textarea>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="white">
                    <div class="form-group basic-textarea">
                        <form method="POST" id="sendMessageForm">
                            @csrf
                            @method('POST')

                            <div class="chat-body white p-3 z-depth-1">

                                <ng-container [formGroup]="testForm">

                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="customSwitches" name="sendTo" formControlName="switchControl" value="class">
                                        <label class="custom-control-label" for="customSwitches">Toggle to switch between Classes and Students</label>
                                    </div>
                                    <hr class="w-100">

                                </ng-container>

                                <label for="recipient">To the Parents of</label>

                                {{-- options from script based on the radio: classes or students--}}
                                <select name="recipient" id="recipient" required>
                                </select><br>

                                <label for="subject">Subject</label>
                                <input type="text" name="subject" required><br>

                                <div class="form-group basic-textarea">
                                    <textarea name="description" class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..." required></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-blue btn-rounded btn-sm waves-effect waves-light float-right" name="submitHomework">Send</button>

                        </form>

                </div>

            </div>
            <!-- Grid column -->

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

    requestMessages();


    $(function(){
        $('button[type="submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/user/messages',
                type: 'post',
                data: $('#sendMessageForm').serialize(),
                success: function(result){
                    console.log(result);
                    requestMessages();
                },
                error: function(err){
                    console.log(err)
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

@endsection
