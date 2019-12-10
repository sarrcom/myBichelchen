@extends('templates.main')
@section('title', 'myBichelchen')
@section('content')
<!-- Modal -->
<div class="modal fade" id="elegantModalForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
        <!--Header-->
        <div class="modal-header text-center">
            <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Sign in</strong></h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!--Body-->
    <div id="errorMessage">
        @if(!empty($error))
        {{$error}}
        @endif
    </div>
        <div class="modal-body mx-4">
            <!--Body-->
            
            <form  method="POST" id="loginForm">
                @csrf
                @method('POST')
                <div class="md-form mb-5">
                    <input type="text" id="Form-email1" name="loginFormUserName" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="Form-email1">Your Username</label>
                </div>

                <div class="md-form pb-3">
                    <input type="password" id="Form-pass1" name="loginFormPassword" class="form-control validate">
                    <label data-error="wrong" data-success="right" for="Form-pass1">Your password</label>
                    <p class="font-small orange-text d-flex justify-content-end"><a href="#" class="orange-text ml-1">Forgot
                    Password?</a></p>
                </div>

                <div class="text-center mb-3">
                    <button type="button submit" class="btn peach-gradient btn-block btn-rounded z-depth-1a" id="loginButtonHome">Sign in</button>
                </div>
            </form>

        </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Modal -->
<div class="view jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url('../../MDB/img/AdobeStock_190123382_Preview.png'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
    <div class="mask rgba-white-slight">
        <div class="container h-100 d-flex justify-content-center align-items-center">
            <div class="row pt-5 mt-3">
                <div class="col-md-12 wow fadeIn mb-3">
                    <div class="text-center">
                        <h1 class="display-4 font-weight-bold mb-5 wow fadeInUp"><img src="../../MDB/img/logo.PNG" alt=""></h1>
                        <h5 class="mb-5 wow fadeInUp" data-wow-delay="0.2s">No More Paper Forms Makes Everyone Happy!</h5>
                        <div class="wow fadeInUp" data-wow-delay="0.4s">
                            <a class="btn btn-orange btn-rounded" data-toggle="modal" data-target="#elegantModalForm"><i class="fas fa-user left"></i>Sign in</a>
                            <a href="#contact" class="btn btn-outline-orange btn-rounded"><i class="fas fa-book left"></i>Contact us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!--Section: Features v.4-->
    <section id="aboutUs" class="section wow fadeIn" data-wow-delay="0.3s">
            <!--Section heading-->
            <h1 class="font-weight-bold text-center h1 my-5">What is myBichelchen?</h1>
            <!--Section description-->
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead"><strong>myBichelchen</strong> is a digital version of the <em>Bichelchen</em> - the agenda the teachers use to note the students’ homework in primary school and to communicate with parents.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead"><strong>myBichelchen</strong> allows an administrator to create teachers, parents, and day care attendants (known as Maison Relais).</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Parents, teachers, and day care attendants can see their children's homework, notes, planned activities, and manage absences.</p>

            {{-- making it multilingual --}}
            <li><a href="{{ url('locale/en') }}" >EN</a></li>
            <li><a href="{{ url('locale/fr') }}" >FR</a></li>

            <h1>{{ __('messages.welcome') }}</h1>


        <hr class="mb-5">
    </section>
    <!--Section: Testimonials v.3-->
    <section class="section team-section text-center pb-3 wow fadeIn" data-wow-delay="0.3s">
        <!--Section heading-->
        <h1 class="font-weight-bold text-center h1 my-5">Testimonials</h1>
        <!--Section description-->
        <p class="text-center grey-text mb-5 mx-auto w-responsive">Tell us why you love myBichelchen!</p>
        <!--Grid row-->
        <div class="row text-center">
            <!--Grid column-->
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <!--Avatar-->
                    <div class="avatar mx-auto">
                        <img src="../../MDB/img/jorge.jpg" class="rounded-circle z-depth-1 img-fluid">
                    </div>
                    <!--Content-->
                    <h4 class="font-weight-bold mt-4 mb-3">Jorge Gonzales</h4>
                    <h6 class="mb-3 font-weight-bold grey-text">Teacher</h6>
                    <p><i class="fas fa-quote-left"></i> myBichelchen saves me an hour per day.</p>
                    <!--Review-->
                    <div class="orange-text">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star-half-alt"> </i>
                    </div>
                </div>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <!--Avatar-->
                    <div class="avatar mx-auto">
                        <img src="../../MDB/img/dennis.jpg" class="rounded-circle z-depth-1 img-fluid">
                    </div>
                    <!--Content-->
                    <h4 class="font-weight-bold mt-4 mb-3">Dennis Burgers</h4>
                    <h6 class="mb-3 font-weight-bold grey-text">Maison Relais</h6>
                    <p><i class="fas fa-quote-left"></i> Viru laanger Zäit gegrënnt, hunn ech mech iergendwéi an dëst verstréckt.</p>
                    <!--Review-->
                    <div class="orange-text">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                    </div>
                </div>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-4 mb-4">
                <div class="testimonial">
                    <!--Avatar-->
                    <div class="avatar mx-auto">
                        <img src="../../MDB/img/reginald.jpg" class="rounded-circle z-depth-1 img-fluid">
                    </div>
                    <!--Content-->
                    <h4 class="font-weight-bold mt-4 mb-3">Reginald Wagner</h4>
                    <h6 class="mb-3 font-weight-bold grey-text">Parent</h6>
                    <p><i class="fas fa-quote-left"></i>
                    Cela a complètement transformé ma vie autour de 360 ​​degrés.</p>
                    <!--Review-->
                    <div class="orange-text">
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="fas fa-star"> </i>
                        <i class="far fa-star"> </i>
                    </div>
                </div>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </section>
    <!--Section: Testimonials v.3-->
    <hr class="mb-5">
    <!--Section: Contact v.2-->
    <section id="contact" class="section pb-5 wow fadeIn" data-wow-delay="0.3s">
        <!--Section heading-->
        <h2 class="font-weight-bold text-center h1 my-5">Contact us</h2>
        <!--Section description-->
        <p class="text-center grey-text mb-5 mx-auto w-responsive">Drop us a message, we'd love to hear from you!</p>
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
                                <label for="contact-name" class="">Your name</label>
                            </div>
                        </div>
                        <!--Grid column-->
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form">
                                <input type="text" id="contact-email" class="form-control">
                                <label for="contact-email" class="">Your email</label>
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
                                <label for="contact-Subject" class="">Subject</label>
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
                                <label for="contact-message">Your message</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid row-->
                </form>
                <div class="text-center text-md-left my-4">
                    <a class="btn btn-orange btn-rounded">Send</a>
                </div>
            </div>
            <!--Grid column-->
            <!--Grid column-->
            <div class="col-md-4 col-xl-3">
                <ul class="contact-icons text-center list-unstyled">
                    <li><i class="fas fa-map-marker fa-2x orange-text"></i>
                        <p>Esch-sur-Alzette, Luxembourg</p>
                    </li>
                    <li><i class="fas fa-phone fa-2x orange-text"></i>
                        <p>+352 691 22 36 00</p>
                    </li>
                    <li><i class="fas fa-envelope fa-2x orange-text"></i>
                        <p>hello@mybichelchen.lu</p>
                    </li>
                    <li>
                        <!-- Goole Maps -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14464.011438319163!2d-71.00875476328515!3d25.000018791136952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89451ab5034cb7ab%3A0xb600ecf3df7aca4d!2sBermuda%20Triangle!5e0!3m2!1sen!2slu!4v1575729231122!5m2!1sen!2slu" width="400" height="300" frameborder="0" style="border:2px solid orange; border-radius: 2.5px;" allowfullscreen=""></iframe>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
        </div>
    </section>
    <!--Section: Contact v.2-->

  </div>

  
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
<!-- Admin User List Script -->

@endsection