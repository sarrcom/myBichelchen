@extends('templates.main')
@section('title', 'Guardian | Overview')

<header id="secondaryHeader">
@section('navbar')
@include('templates.navbar')
@endsection
</header>

@section('content')
<h1 class="d-flex justify-content-center">Overview</h1>
<div class="d-flex justify-content-center">
    <p class="h5 text-primary createShowP">{{date("l")}}, {{date("d/m/Y")}}</p>
    <br>
    <br>
    <br>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-12 mb-4">

            <!--Card-->
            <div class="card card-cascade narrower mb-4" style="margin-top: 28px;">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header peach-gradient">

                    <!-- Title -->
                    <a href="/user/homework" class="white-text">
                        <h2 class="card-header-title mb-2">Homework</h2>
                    </a>

                </div>

                <!--Card content-->
                <div class="card-body card-body-cascade scrollbar-light-blue" style="overflow-y: scroll; height:30rem;">

                    <!-- Text -->
                    @foreach($homeworkArray as $homeworks) @foreach($homeworks as $homework)
                    <p><strong>{{ $homework->subject }}</strong></p>
                    <p class="short-description">{{ $homework->description }}</p>
                    <hr> @endforeach @endforeach

                    <!-- Link -->
                    <a href="/user/homework" class="orange-text d-flex flex-row-reverse p-2">
                        <p class="waves-effect waves-light">Go to Homework<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <div class="col-lg-4 col-md-6 mb-4">

            <!--Card-->
            <div class="card card-cascade narrower mb-4" style="margin-top: 28px">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header peach-gradient">

                    <!-- Title -->
                    <a href="/user/messages" class="white-text">
                        <h2 class="card-header-title mb-2">Notes</h2>
                    </a>

                </div>

                <!--Card content-->
                <div class="card-body card-body-cascade scrollbar-light-blue" style="overflow-y: scroll; height:30rem;">

                    <!-- Text -->
                    @foreach($notesArray as $note)
                    <p><strong>{{ $note->subject }}</strong></p>
                    <p class="short-description">{{ $note->description }}</p>
                    <p class="badge"><em>{{ $note->created_at }}</em></p>
                    <hr> @endforeach

                    <!-- Link -->
                    <a href="/user/messages" class="orange-text d-flex flex-row-reverse p-2">
                        <p class="waves-effect waves-light">Go to Notes<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>
                </div>
                <!--/.Card content-->

            </div>
            <!--/.Card-->

        </div>
        <div class="col-lg-4 col-md-6">

            <!--Card-->
            <div class="card card-cascade narrower mb-4" style="margin-top: 28px">

                <!-- Card image -->
                <div class="view view-cascade gradient-card-header peach-gradient">

                    <!-- Title -->
                    <a href="#!" class="white-text">
                        <h2 class="card-header-title mb-2">Absences</h2>
                    </a>

                </div>

                <!--Card content-->
                <div class="card-body card-body-cascade scrollbar-light-blue" style="overflow-y: scroll; height:30rem;">

                    <!-- Text -->
                    @foreach($absences as $absence)
                    <p><strong>{{ $absence->subject }}</strong></p>
                    <p class="short-description">{{ $absence->description }}</p>
                    <hr> @endforeach

                    <!-- Link -->
                    <a href="#!" class="orange-text d-flex flex-row-reverse p-2">
                        <p class="waves-effect waves-light">Go to Absences<i class="fas fa-angle-double-right ml-2"></i></p>
                    </a>

                </div>
                <!-- /Card -->
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
@include('templates.footer')
@endsection
