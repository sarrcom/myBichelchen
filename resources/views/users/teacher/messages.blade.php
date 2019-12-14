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
    <div class="card near-moon-gradient chat-room">
        <div class="card-body">
            <!-- Messages List -->
            <!-- Grid row -->
            <div class="row px-lg-2 px-2">

            <!-- Grid column -->
            <div class="col-md-6 col-xl-4 px-0">

                <h6 class="font-weight-bold mb-3 text-center text-lg-left">myBichelchen Member</h6>
                <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
                    <ul class="list-unstyled friend-list">
                        <li class="active grey lighten-3 p-2">
                            <a href="#" class="d-flex justify-content-between">
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
                        <li class="p-2">
                            <a href="#" class="d-flex justify-content-between">
                                <div class="text-small">
                                <strong>Danny Smith</strong>
                                <p class="last-message text-muted">Lorem ipsum dolor sit.</p>
                                </div>
                                <div class="chat-footer">
                                <p class="text-smaller text-muted mb-0">5 min ago</p>
                                <span class="text-muted float-right"><i class="fas fa-mail-reply" aria-hidden="true"></i></span>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Grid column -->
            <!-- /Messages List -->

            <!-- Selected Message -->
            <!-- Grid column -->
            <div class="col-md-6 col-xl-8 pl-md-3 px-lg-auto px-0">

                <div class="chat-message">

                <ul class="list-unstyled chat-1 scrollbar-light-blue">

                    <li class="d-flex justify-content-between mb-4">
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
                    
                </ul>
                <!-- Send Message -->
                <div class="white">
                    <div class="form-group basic-textarea">
                    <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3" placeholder="Type your message here..."></textarea>
                    </div>
                </div>
                <button type="button" class="btn btn-outline-white btn-rounded btn-sm waves-effect waves-dark float-right">Send</button>

                </div>

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
