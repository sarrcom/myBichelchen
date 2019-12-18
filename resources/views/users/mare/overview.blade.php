@extends('templates.main')
@section('title', 'Overview')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')
<h1 class="d-flex justify-content-center">Overview</h1>
<div class="d-flex justify-content-center">
    <p class="h5 text-primary createShowP">{{date("l")}}, {{date("d/m/Y")}}</p>
    <br><br><br>
</div>

<!-- Notifications -->
<div id="overview" class="container">
    <!-- Homework Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header purple-gradient">

                <!-- Title -->
                <a href="/user/homework" class="white-text">
                    <h2 class="card-header-title mb-3">Homework</h2>
                </a>
                <!-- Subtitle -->
                <p class="card-header-subtitle mb-0">Today's Homework</p>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Text -->
                @foreach($homeworkArray as $homeworks)
                    @foreach($homeworks as $homework)
                        <p><strong>{{ $homework->subject }}</strong></p>
                        <p class="short-description">{{ $homework->description }}</p>
                        <hr>
                    @endforeach
                @endforeach
                <!-- Link -->
                <a href="/user/homework" class="purple-text d-flex flex-row-reverse p-2">
                    <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
                </a>
            </div>

        </div>
    </div>
    <!-- /Card -->

    <!-- Notes Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header peach-gradient">

                <!-- Title -->
                <a href="/user/messages" class="white-text">
                    <h2 class="card-header-title mb-3">Notes</h2>
                </a>
                <!-- Subtitle -->
                <p class="card-header-subtitle mb-0">Today's Notes</p>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Text -->
                @foreach($notesArray as $notes)
                    @foreach($notes as $note)
                        <p><strong>{{ $note->subject }}</strong></p>
                        <p class="short-description">{{ $note->description }}</p>
                        <p class="badge"><em>{{ $note->created_at }}</em></p>
                        <hr>
                    @endforeach
                @endforeach
                <!-- Link -->
                <a href="/user/messages" class="orange-text d-flex flex-row-reverse p-2">
                    <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
                </a>
            </div>

        </div>
    </div>
    <!-- /Card -->

    <!-- Absences Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header aqua-gradient">

                <!-- Title -->
                <a href="#!" class="white-text">
                    <h2 class="card-header-title mb-3">Absences</h2>
                </a>
                <!-- Subtitle -->
                <p class="card-header-subtitle mb-0">Today's Absences</p>
            </div>

            <!-- Card content -->
            <div class="card-body card-body-cascade text-center">

                <!-- Text -->
                @foreach($absences as $absence)
                    <p><strong>{{ $absence->subject }}</strong></p>
                    <p class="short-description">{{ $absence->description }}</p>
                    <hr>
                @endforeach
                <!-- Link -->
                <a href="#!" class="blue-text d-flex flex-row-reverse p-2">
                    <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
                </a>
            </div>

        </div>
    </div>
    <!-- /Card -->

</div>
<!-- /Notifications -->
@endsection
@section('footer')
@include('templates.footer')
@endsection
