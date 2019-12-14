@extends('templates.main')
@section('title', 'overview')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')

<!-- teacher-overview
<br>
{{$user->first_name}}

<br>
@foreach ($user->students as $student)
    {{$student->first_name}}
    <br>
@endforeach -->

<h1 class="d-flex justify-content-center">Teacher {{$user->first_name}}'s Messages</h1>
<div class="d-flex justify-content-center">
    <p class="h5 text-primary createShowP">{{date("l")}}, {{date("d/m/Y")}}</p>
    <br><br><br>
</div>

<div id="overview" class="container">
    <!-- Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header purple-gradient">

                <!-- Title -->
                <h2 class="card-header-title mb-3">Homework</h2>
                <!-- Subtitle -->
                <p class="card-header-subtitle mb-0">Today's Homework</p>
            </div>

            <!-- Card content -->
            <div id="cardWidth" class="card-body card-body-cascade text-center">

                <!-- Text -->
                <p class="card-text">Today's Homework Logic goes here</p>

                <!-- Link -->
                <a href="/user/homework" class="purple-text d-flex flex-row-reverse p-2">
                    <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
                </a>
            </div>

        </div>
    </div>
    <!-- Card -->

    <!-- Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header peach-gradient">

                <!-- Title -->
                <h2 class="card-header-title mb-3">Notes</h2>
                <!-- Subtitle -->
                <p class="card-header-subtitle mb-0">Today's Notes</p>
            </div>

            <!-- Card content -->
            <div id="cardWidth" class="card-body card-body-cascade text-center">

                <!-- Text -->
                <p class="card-text">Today's Notes Logic goes here</p>
                <!-- Link -->
                <a href="#!" class="orange-text d-flex flex-row-reverse p-2">
                    <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
                </a>
            </div>

        </div>
    </div>
    <!-- Card -->

    <!-- Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header blue-gradient">

                <!-- Title -->
                <h2 class="card-header-title mb-3">Absences</h2>
                <!-- Subtitle -->
                <p class="card-header-subtitle mb-0">Today's Absences</p>
            </div>

            <!-- Card content -->
            <div id="cardWidth" class="card-body card-body-cascade text-center">

                <!-- Text -->
                <p class="card-text">Today's Absences Logic goes here</p>
                <!-- Link -->
                <a href="#!" class="blue-text d-flex flex-row-reverse p-2">
                    <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
                </a>
            </div>

        </div>
    </div>
    <!-- Card -->

</div>
<!-- Unread Messages -->
<br><br><br>
<!-- Grid row -->
<div class="container">
    <h3 class="d-flex justify-content-center">Unread Messages</h3>
    <br><br><br>
    <!-- Grid column -->
    <div class="col-md-6 col-xl-4 px-0">
        <div class="white z-depth-1 px-2 pt-3 pb-0 members-panel-1 scrollbar-light-blue">
            <ul class="list-unstyled friend-list">
                <li>
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
            </ul>
        </div>
    </div>
</div>
@endsection

@section('footer')
@include('templates.footer')
@endsection
