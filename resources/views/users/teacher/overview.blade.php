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
        <div class="col-4">
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
                <div id="cardWidth" class="card-body card-body-cascade text-center">

                    <!-- Text -->
                    <p class="card-text">Today's Homework Logic goes here</p>
                    @foreach($homeworkArray as $homeworks)
                        @foreach($homeworks as $homework)
                            <p><strong>{{ $homework->subject }}:</strong> {{ $homework->description }}</p>
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
        <div class="col-4">
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
                <div id="cardWidth" class="card-body card-body-cascade text-center">

                    <!-- Text -->
                    <p class="card-text">Today's Notes Logic goes here</p>
                    @foreach($notes as $note)
                        <p><strong>{{ $note->subject }}:</strong> {{ $note->description }} <em>{{ $note->created_at }}</em></p>
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
        <div class="col-4">
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
                <div id="cardWidth" class="card-body card-body-cascade text-center">

                    <!-- Text -->
                    <p class="card-text">Today's Absences Logic goes here</p>
                    @foreach($absences as $absence)
                        <p><strong>{{ $absence->subject }}:</strong> {{ $absence->description }} <em>{{ $absence->created_at }}</em></p>
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
</div>
<!-- /Notifications -->

    <!-- Grid column -->
    <div class="column-1 px-2">

    <!--Card-->
    <div class="card warning-color-dark">

        <!--Card image-->
        <div class="view">
        <img src="https://mdbootstrap.com/img/Photos/Slides/img%2812%29.jpg" class="card-img-top" alt="photo">
        <a href="#">
            <div class="mask rgba-white-slight"></div>
        </a>
        </div>

        <!--Card content-->
        <div class="card-body text-center">
        <!--Title-->
        <h4 class="card-title white-text">Title of the news</h4>
        <!--Text-->
        <p class="card-text white-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
            aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
            Nemo enim ipsam voluptatem quia voluptas.</p>
        <a href="#" class="btn btn-outline-white btn-md">Button</a>
        </div>

    </div>
    <!--/.Card-->

    </div>
    <!-- Grid column -->

    </div>
    <!-- Grid row -->
</div>
@endsection
@include('templates.scripts')
@section('footer')
@include('templates.footer')
<script>



</script>
@endsection
