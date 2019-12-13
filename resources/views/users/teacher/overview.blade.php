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

<div id="overview" class="container">
    <!-- Card -->
    <div class="row mx-1">
        <div class="card card-cascade narrower">

        <!-- Card image -->
        <div class="view view-cascade gradient-card-header purple-gradient">

            <!-- Title -->
            <h2 class="card-header-title mb-3">Homework</h2>
            <!-- Subtitle -->
            <p class="card-header-subtitle mb-0">Deserve for her own card</p>
        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">

            <!-- Text -->
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ex, recusandae. Facere modi sunt, quod quibusdam dignissimos neque rem nihil ratione est placeat vel, natus non quos laudantium veritatis sequi.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi.</p>
            <!-- Link -->
            <a href="#!" class="purple-text d-flex flex-row-reverse p-2">
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
            <p class="card-header-subtitle mb-0">Deserve for her own card</p>

        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">

            <!-- Text -->
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ex minis recusandae. Facere modi sunt, quod quibusdam dignissimos neque rem nihil ratione est placeat vel, natus non quos laudantium veritatis sequi.Ut enim ad minima veniam, quis nostrum.</p>
            <!-- Link -->
            <a href="#!" class="orange-text d-flex flex-row-reverse p-2">
            <h5 class="waves-effect waves-light">Read more<i class="fas fa-angle-double-right ml-2"></i></h5>
            </a>

        </div>
        <!-- Card content -->

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
            <p class="card-header-subtitle mb-0">Deserve for her own card</p>

        </div>

        <!-- Card content -->
        <div class="card-body card-body-cascade text-center">

            <!-- Text -->
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus, ex, recusandae. Facere modi sunt, quod quibusdam dignissimos neque rem nihil ratione est placeat vel, natus non quos laudantium veritatis sequi.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</p>
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
