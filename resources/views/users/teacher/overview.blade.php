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

<h1 class="d-flex justify-content-center">Teacher {{$user->first_name}}'s Overview</h1>
<h4 class="d-flex justify-content-center">{{date("l")}}, {{date("d/m/Y")}}</h4>

<div id="overview" class="container">
    <!-- Card -->
    <div id="cardWidth" class="row mx-1">
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
    <div id="cardWidth" class="row mx-1">
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
@endsection

@section('footer')
@include('templates.footer')
@endsection
