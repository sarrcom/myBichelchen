@extends('templates.main')
@section('title', 'Admin Login')

<header id="secondaryHeader">
    @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
            <div class="container">
                <a class="navbar-brand" href="#"><strong>myBichelchen</strong></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent-7">
                    <ul class="navbar-nav mr-auto">
                        <!-- http://www.supremeschoolsupply.com/school-slogan-ideas/ -->
                        <a class="navbar-brand" href="#"><strong>the future begins here</strong></a>
                    </ul>
                </div>
            </div>
        </nav>
    @endsection
</header>

@section('content')
<!-- Login Form -->
    <div class="container" id="adminLoginForm">
        <div class="row d-flex justify-content-center modalWrapper">
            <!-- Material form login -->
            <div class="card">

            <h5 class="card-header orange white-text text-center py-4">
                <strong>Admin Login</strong>
            </h5>

            <!--Card content-->
            <div class="card-body px-lg-5 pt-0">

                <!-- Form -->
                <form class="text-center" style="color: #757575;" action="#!" id="loginForm">
                @csrf
                @method('POST')
                <!-- Email -->
                <div class="md-form">
                    <input type="text" name="loginFormUserName" id="loginFormUserName" class="form-control">
                    <label for="loginFormUserName">Username</label>
                </div>

                <!-- Password -->
                <div class="md-form">
                    <input type="password" name="loginFormPassword" id="loginFormPassword" class="form-control">
                    <label for="loginFormPassword">Password</label>
                </div>

                <!-- Sign in button -->
                <button class="btn peach-gradient btn-block btn-rounded z-depth-1a" type="button submit" id="loginButtonAdmin">Sign in</button>

                </form>
                <!-- Form -->

            </div>

            </div>
            <!-- Material form login -->
        </div>
    </div>
<!-- Login Form -->

<hr class="mb-5">
<div class="container">
    <div class="row d-flex justify-content-center modalWrapper">
        <!--Section: Contact v.2-->
        <section id="contact" class="section pb-5 wow fadeIn" data-wow-delay="0.3s">
            <!--Section heading-->
            <h2 class="font-weight-bold text-center h1 my-5">{{ __('landing-page.contact') }}</h2>
            <div class="row">
                <!--Grid column-->
                <div class="col-md-8 col-xl-9">
                    <form>
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" id="contact-name" class="form-control">
                                    <label for="contact-name" class="">{{ __('landing-page.your_name') }}</label>
                                </div>
                            </div>
                            <!--Grid column-->
                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form">
                                    <input type="text" id="contact-email" class="form-control">
                                    <label for="contact-email" class="">{{ __('landing-page.your_email') }}</label>
                                </div>
                            </div>
                            <!--Grid column-->
                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="text" id="contact-Subject" class="form-control">
                                    <label for="contact-Subject" class="">{{ __('landing-page.your_subject') }}</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                        <!--Grid row-->
                        <div class="row">
                            <!--Grid column-->
                            <div class="col-md-12">
                                <div class="md-form">
                                    <textarea type="text" id="contact-message" class="md-textarea form-control" rows="3"></textarea>
                                    <label for="contact-message">{{ __('landing-page.your_message') }}</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->
                    </form>
                    <div class="text-center text-md-left my-4">
                        <a class="btn btn-orange btn-rounded">{{ __('landing-page.send') }}</a>
                    </div>
                </div>
                <!--Grid column-->
                <!--Grid column-->
                <div class="col-md-4 col-xl-3">
                    <ul class="contact-icons text-center list-unstyled">
                        <li><i class="fas fa-map-marker fa-2x orange-text"></i>
                            <p>9, ave des Hauts-Fourneaux<br>
                                L-4362 Belval<br>
                                Luxembourg</p>
                        </li>
                        <li><i class="fas fa-phone fa-2x orange-text"></i>
                            <p>+352 691 22 36 00</p>
                        </li>
                        <li><i class="fas fa-envelope fa-2x orange-text"></i>
                            <p>hello@mybichelchen.lu</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
        </section>
        <!--Section: Contact v.2-->
    </div>
</div>
<!--Grid column-->
</div>
@endsection

@section('footer')
<!--Footer-->
<footer class="page-footer pt-4 mt-4   text-center text-md-left mt-5">

<div class="container">
    <!--Grid row-->
    <div class="row mb-3">
        <!--First column-->
        <div class="col-md-12">
            <ul class="list-unstyled d-flex justify-content-center mb-0 py-4 list-inline">
                <a class="navbar-brand" href="#"><strong></strong></a>
            </ul>
        </div>
        <!--/First column-->
    </div>
    <!--/Grid row-->
</div>
<!--/.Footer Links-->
<!--Copyright-->
<div class="footer-copyright py-3 text-center">
    <div class="container-fluid">&copy; 2019 <a href="https://mybichelchen.lu/">myBichelchen.lu</a> - {{ __('footer.rights') }} |
    </div>
</div>
<!--/.Copyright-->
</footer>
<!-- Footer -->
@endsection

@section('extra-scripts')
<script>
    $(function(){
        $('button[type="button submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/admin/login',
                type: 'post',
                data: $('#loginForm').serialize(),
                success: function(result){
                    console.log(result);
                    if (result === 'Login') {
                        window.location.replace('/users');
                    }else{
                        $('#errorMessage').html(result);

                    }

                },
                error: function(err){
                    console.log('Oh boi')
                }
            });
        });
    });
</script>
@endsection
