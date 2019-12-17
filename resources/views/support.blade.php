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
                    <label for="Form-email1">{{ __('landing-page.your_username') }}</label>
                </div>

                <div class="md-form pb-3">
                    <input type="password" id="Form-pass1" name="loginFormPassword" class="form-control validate">
                    <label for="Form-pass1">{{ __('landing-page.your_password') }}</label>
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
            <h1 class="font-weight-bold text-center h1 my-5">Support</h1>
            <!--Section description-->
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Questions arise at off-hours and are usually urgent. If you have an issue with your <strong>myBichelchen</strong> portal, you should never have to wait to receive answers to your questions. If we are unable to speak with you immediately, please leave a message so we can return your call as soon as possible. If your question is not listed in our online documentation, please do not hesitate to <a href="/contact">contact</a> us.</p>

            <h1 class="font-weight-bold text-center h1 my-5">Documentation</h1>

            <h2 class="font-weight-bold text-center h2 my-5">Parents</h2>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">- you can login by clicking the <strong>Login</strong> button on the home page<br>
            - once logged in you will see an overview and you can easily switch between your children (if you have more than 1)<br>
            - you can see the homework and notes for each child, and you can add notes by clicking the <strong>Add</strong> button<br>
            - you can sign the agenda checking the checkbox next to the homework<br>
            - you can inform the teacher if a child is absent by clicking the <strong>Absent</strong> button<br>
            - you can send messages to the teacher by clicking the <strong>Message</strong> button</p>

            <h2 class="font-weight-bold text-center h2 my-5">Daycare</h2>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">- you can login by clicking the <strong>Login</strong> button on the home page<br>
            - once logged in you can an overview of all the children in your care<br>
            - you can select a child in the list and then click the <strong>Edit</strong> button to edit the details<br>
            - you can sign the agenda checking the checkbox next to the homework<br>
            - you can see the homework and notes for each child, and you can add or reply to notes by clicking the <strong>Add</strong> button</p>

            <h2 class="font-weight-bold text-center h2 my-5">Teachers</h2>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">- you can login by clicking the <strong>Login</strong> button on the home page<br>
            - you can see the homework and notes for the day, and you can add homework and notes by clicking the <strong>Add</strong> button<br>
            - you can create homework and/or notes for the entire class or a single student<br>
            - you can see who replied to your notes by clicking the <strong>Messages</strong> tab<br>
            - you can add and see absences by clicking the <strong>Absent</strong> button</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">If your question is not listed in our online documentation, please do not hesitate to get in touch.</p>
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
