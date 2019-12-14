@extends('templates.main')
@section('title', 'Overview')

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
    <!-- /Card -->

    <!-- Notes Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

            <!-- Card image -->
            <div class="view view-cascade gradient-card-header peach-gradient">

                <!-- Title -->
                <a href="#!" class="white-text">
                    <h2 class="card-header-title mb-3">Notes</h2>
                </a>
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
    <!-- /Card -->

</div>
<!-- /Notifications -->

<br><br><br>

<!-- Unread Messages -->
<div class="container">
    <!-- Table with panel -->
    <div class="card card-cascade narrower">

    <!--Card image-->
    <div
        class="view view-cascade gradient-card-header blue-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-between align-items-center">

        <div>
            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="far fa-envelope"></i>
            </button>
        </div>

        <a href="/user/messages" class="white-text mx-3">Unread Messages</a>

        <div>
            <button type="button" class="btn btn-outline-white btn-rounded btn-sm px-2">
                <i class="far fa-trash-alt mt-0"></i>
            </button>
        </div>

    </div>
    <!--/Card image-->

    <div class="px-4">

        <div class="table-wrapper">
        <!--Table-->
        <table class="table table-hover mb-0">

            <!--Table head-->
            <thead>
            <tr>
                    <th>
                        <input class="form-check-input" type="checkbox" id="checkbox">
                        <label class="form-check-label" for="checkbox" class="mr-2 label-table"></label>
                    </th>
                <th class="th-lg">
                    <a>First Name</a>
                </th>
                <th class="th-lg">
                    <a href="">Last Name</a>
                </th>
                <th class="th-lg">
                    <a href="">Username</a>
                </th>
                <th class="th-lg">
                    <a href="">Message</a>
                </th>
                <th class="th-lg">
                    <a href="">Date</a>
                </th>
            </tr>
            </thead>
            <!--/Table head-->

            <!--Table body-->
            <tbody>
                <tr>
                    <th scope="row">
                    <input class="form-check-input" type="checkbox" id="checkbox1">
                    <label class="form-check-label" for="checkbox1" class="label-table"></label>
                    </th>
                    <td>Elaine</td>
                    <td>Kim</td>
                    <td>clusterfox</td>
                    <td>Hello are you there</td>
                    <td>{{date("d/m/Y")}}</td>
                </tr>
            </tbody>
            <!--/Table body-->
        </table>
        <!--/Table-->
        </div>

    </div>

    </div>
    <!-- Table with panel -->
</div>
<!-- /Unread Meassages -->

@endsection

@section('footer')
@include('templates.footer')
@endsection

