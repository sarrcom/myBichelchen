@extends('templates.main')
@section('title', 'myBichelchen')

<header>
@section('navbar')
@include('templates.navbar')
@endsection
<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../../MDB/img/AdobeStock_190123382_Preview.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-white-slight">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row pt-5 mt-3">
                <div class="col-md-12 wow fadeIn mb-3">
                    <div class="text-center">
                        <h1 class="display-4 font-weight-bold mb-5 wow fadeInUp"><img id="logo" src="../../MDB/img/logo.PNG" alt=""></h1>
                        <h5 class="mb-5 wow fadeInUp" data-wow-delay="0.2s">{{ __('landing-page.slug') }}</h5>
                        <div class="wow fadeInUp" data-wow-delay="0.4s">
                            <a class="btn btn-orange btn-rounded" data-toggle="modal" data-target="#elegantModalForm"><i class="fas fa-user left"></i>{{ __('landing-page.sign_in') }}</a>
                            <a href="#contact" class="btn btn-outline-orange btn-rounded"><i class="fas fa-book left"></i>{{ __('landing-page.contact_us') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</header>

@section('content')
<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
        <!--Header-->
        <div class="modal-header text-center">
            <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>{{ __('landing-page.sign_in_2') }}</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!--Body-->
    <div id="errorMessage">
    </div>
        <div class="modal-body mx-4">
            <!--Body-->

            <form  method="POST" id="loginForm">
                @csrf
                @method('POST')
                <div class="md-form mb-5">
                    <input type="text" id="Form-email1" name="loginFormUserName" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="Form-email1">{{ __('landing-page.your_username') }}</label>
                </div>

                <div class="md-form pb-3">
                    <input type="password" id="Form-pass1" name="loginFormPassword" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="Form-pass1">{{ __('landing-page.your_password') }}</label>
                    <p class="font-small orange-text d-flex justify-content-end"><a href="#" class="orange-text ml-1">{{ __('landing-page.forgot_password') }}</a></p>
                </div>

                <div class="text-center mb-3">
                    <button type="button submit" class="btn peach-gradient btn-block btn-rounded z-depth-1a" id="loginButtonHome">{{ __('landing-page.sign_in') }}</button>
                </div>
            </form>

        </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->
<div class="container">
    <!--Section: Features v.4-->
    <section id="about" class="section wow fadeIn" data-wow-delay="0.3s">
            <!--Section heading-->
            <h1 class="font-weight-bold text-center h1 my-5">Cookie Policy for myBichelchen</h1>
            <!--Section description-->
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">This is the Cookie Policy for myBichelchen, accessible from <a href="https://mybichelchen.lu">https://mybichelchen.lu</a></p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead"><strong>What Are Cookies</strong></p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">As is common practice with almost all professional websites this site uses cookies, which are tiny files that are downloaded to your computer, to improve your experience. This page describes what information they gather, how we use it and why we sometimes need to store these cookies. We will also share how you can prevent these cookies from being stored however this may downgrade or 'break' certain elements of the sites functionality.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead"><strong>How We Use Cookies</strong></p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We use cookies for a variety of reasons detailed below. Unfortunately in most cases there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead"><strong>Disabling Cookies</strong></p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help for how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of the this site. Therefore it is recommended that you do not disable cookies.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead"><strong>The Cookies We Set</strong></p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Account related cookies<br>
            If you create an account with us then we will use cookies for the management of the signup process and general administration. These cookies will usually be deleted when you log out however in some cases they may remain afterwards to remember your site preferences when logged out.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Login related cookies<br>
            We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access restricted features and areas when logged in.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Forms related cookies<br>
            When you submit data to through a form such as those found on contact pages or comment forms cookies may be set to remember your user details for future correspondence.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Site preferences cookies<br>
            In order to provide you with a great experience on this site we provide the functionality to set your preferences for how this site runs when you use it. In order to remember your preferences we need to set cookies so that this information can be called whenever you interact with a page is affected by your preferences.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Third Party Cookies<br>
            In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you might encounter through this site.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">This site uses Google Analytics which is one of the most widespread and trusted analytics solution on the web for helping us to understand how you use the site and ways that we can improve your experience. These cookies may track things such as how long you spend on the site and the pages that you visit so we can continue to produce engaging content.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">From time to time we test new features and make subtle changes to the way that the site is delivered. When we are still testing new features these cookies may be used to ensure that you receive a consistent experience whilst on the site whilst ensuring we understand which optimisations our users appreciate the most.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We also use social media buttons and/or plugins on this site that allow you to connect with your social network in various ways. For these to work the following social media sites including Facebook, Twitter, Linkedin, Instagram, and Pinterest, will set cookies through our site which may be used to enhance your profile on their site or contribute to the data they hold for various purposes outlined in their respective privacy policies.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">If you are still looking for more information then you can <a href="/contact">contact</a> us by <a href="mailto:hello@mybichelchen.lu">email</a>.</p>
    </section>

    <hr class="mb-5">
    <!--Section: Contact v.2-->
    <section id="contact" class="section pb-5 wow fadeIn" data-wow-delay="0.3s">
        <!--Section heading-->
        <h2 class="font-weight-bold text-center h1 my-5">{{ __('landing-page.contact') }}</h2>
        <!--Section description-->
        <p class="text-center grey-text mb-5 mx-auto w-responsive">{{ __('landing-page.contact_msg') }}</p>
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
                    <li>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2591.0504564132575!2d5.946978215870579!3d49.50244116309531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47eacad49ef04f7d%3A0x8599a1646a7921b9!2sTECHNOPORT%20SA%20%E2%80%93%20BELVAL%2C%209%20Avenue%20des%20Hauts-Fourneaux%2C%204362%20Esch%20an%20der%20Alzette!5e0!3m2!1sen!2slu!4v1575989181454!5m2!1sen!2slu" width="200" height="300" frameborder="0" style="border:2px solid orange; border-radius: 2.5px;"></iframe>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
    </section>
    <!--Section: Contact v.2-->

  </div>

@endsection

@section('footer')
@include('templates.footer')
@endsection

@section('extra-scripts')
<script>
    $(document).ready(function(){
        $(this).scrollTop(0);
    });
</script>
<script>
    $(function(){
        $('button[type="button submit"]').click(function(e){
            e.preventDefault();
            $.ajax({
                url: '/',
                type: 'post',
                data: $('#loginForm').serialize(),
                success: function(result){
                    console.log(result);
                    if (result === 'Login') {
                        window.location.replace('/user');
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
