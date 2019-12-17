@extends('templates.main')
@section('title', 'Teacher | Overview')

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

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-12 mb-4">

            <!--Card-->
            <div class="card card-cascade narrower mb-4" style="margin-top: 28px;">

           <!-- Card image -->
           <div class="view view-cascade gradient-card-header purple-gradient">

                <!-- Title -->
                <a href="/user/homework" class="white-text">
                    <h2 class="card-header-title mb-3">Homework</h2>
                </a>
                <!-- Subtitle -->
                <p class="card-header-subtitle mb-0">Today's Homework</p>
            </div>

            <!--Card content-->
            <div class="card-body card-body-cascade scrollbar-light-blue" style="overflow-y: scroll; height:30rem;">

                    <!-- Text -->
                    <p class="card-text">
                        @foreach($homeworkArray as $homeworks)
                            @foreach($homeworks as $homework)
                                <p><strong>{{ $homework->subject }}:</strong> {{ $homework->description }}</p>
                            @endforeach
                        @endforeach
                    </p>

                <!-- Link -->
                <a href="/user/homework" class="purple-text d-flex flex-row-reverse p-2">
                    <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
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
                <h2 class="card-header-title mb-3">Notes</h2>
            </a>
            <!-- Subtitle -->
            <p class="card-header-subtitle mb-0">Today's Notes</p>
        </div>

        <!--Card content-->
        <div class="card-body card-body-cascade" style="overflow-y: scroll; height:30rem;">

            <!-- Text -->
            <p class="card-text">
                @foreach($notes as $note)
                    <p><strong>{{ $note->subject }}:</strong> {{ $note->description }} <em>{{ $note->created_at }}</em></p>
                @endforeach
            </p>

            <!-- Link -->
            <a href="/user/messages" class="orange-text d-flex flex-row-reverse p-2">
                <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
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
        <div class="view view-cascade gradient-card-header aqua-gradient">

            <!-- Title -->
            <a href="#!" class="white-text">
                <h2 class="card-header-title mb-3">Absences</h2>
            </a>
            <!-- Subtitle -->
            <p class="card-header-subtitle mb-0">Today's Absences</p>
        </div>

        <!--Card content-->
        <div class="card-body card-body-cascade" style="overflow-y: scroll; height:30rem;">

            <!-- Text -->
            <p class="card-text">
                @foreach($absences as $absence)
                    <p><strong>{{ $absence->subject }}:</strong> {{ $absence->description }} <em>{{ $absence->created_at }}</em></p>
                @endforeach
            </p>

            <!-- Link -->
            <a href="#!" class="blue-text d-flex flex-row-reverse p-2">
                <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
            </a>

        </div>
        <!--/.Card content-->

        </div>
        <!--/.Card-->

    </div>
    </div>
</div>

@endsection
@include('templates.scripts')
@section('footer')
@include('templates.footer')
<script>



</script>
@endsection
