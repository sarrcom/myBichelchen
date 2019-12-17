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

<div class="container">
   <!-- Grid row -->
    <div class="row">

    <!-- Grid column -->
    <div class="column-2 px-2 mb-r">

    <!--Card-->
    <div class="card default-color-dark">

        <!--Card image-->
        <div class="view">
        <img src="https://mdbootstrap.com/img/Photos/Slides/img%2810%29.jpg" class="card-img-top" alt="photo">
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

    <!-- Grid column -->
    <div class="column-1 px-2 mb-r">

    <!--Card-->
    <div class="card primary-color-dark">

        <!--Card image-->
        <div class="view">
        <img src="https://mdbootstrap.com/img/Photos/Slides/img%2811%29.jpg" class="card-img-top" alt="photo">
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
