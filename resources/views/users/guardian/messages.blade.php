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
                            
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                <div class="chat-message">
                    <!-- Scroll bar -->
                    <

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
