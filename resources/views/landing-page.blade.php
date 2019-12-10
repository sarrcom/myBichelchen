@php
    if(!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['error'])) {
        $error = $_SESSION['error'];
    }
@endphp
@extends('templates.main')
@include('templates.header')
@section('title', 'myBichelchen')
@section('content')

<div class="container">
    <!--Section: Features v.4-->
    <section id="aboutUs" class="section wow fadeIn" data-wow-delay="0.3s">
        <!--Section heading-->
        <h1 class="font-weight-bold text-center h1 my-5">Why is it so great?</h1>
        <!--Section description-->
        <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Reginald had always loved quaint Luxembourg with its tense, terrible trees. It was a place where he felt excited.
                He was an intelligent, articulate, wine drinker with beautiful fingers and curvaceous toes. His friends saw him as a purring, panicky patient. Once, he had even saved a raspy toddler that was stuck in a drain. That's the sort of man he was.
                Reginald, walked over to the window and reflected on his pleasant surroundings. The rain hammered like loving pigeons.
                Then he saw something in the distance, or rather someone. It was the figure of Dennis. Dennis was a friendly do gooder with red fingers and solid toes.
                Reginald, gulped. He was not prepared for Dennis,.
                As Reginald, stepped outside and Dennis, came closer, he could see the stormy smile on his face.
                "Look Reginald" growled Dennis with a loving glare that reminded Reginald, of friendly flamingos. "It's not that I don't love you, but I want business. You owe me 1186 euros."
                Reginald, looked back, even more convincing and still fingering the round rock. "Dennis let's make a website," he replied.
                They looked at each other with interesting feelings, like two beautiful, brave badgers talking at a very admirable snow storm, which had drum and bass music playing in the background and two cowardly uncles laughing to the beat.
                Reginald regarded Dennis's red fingers and solid toes. "I don't have the funds ..." he lied.
                Dennis glared. "Do you want me to shove that round rock where the sun don't shine?"
                Reginald promptly remembered his intelligent and articulate values. "Actually, I do have the funds," he admitted. He reached into his pockets. "Here's what I owe you."
                Dennis, looked delighted, his wallet blushing like a rotten, relieved ruler.
                Then Dennis, came inside for a nice glass of wine.</p>
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
                    <h4 class="font-weight-bold mt-4 mb-3">Orgie Man Speedy Gonzales</h4>
                    <h6 class="mb-3 font-weight-bold grey-text">Web Designer</h6>
                    <p><i class="fas fa-quote-left"></i> Eu gosto porque eu fiz isso.</p>
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
                    <h4 class="font-weight-bold mt-4 mb-3">Dennis McFortressBurger</h4>
                    <h6 class="mb-3 font-weight-bold grey-text">Web Developer</h6>
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
                    <h4 class="font-weight-bold mt-4 mb-3">Reginald van Wahahaha</h4>
                    <h6 class="mb-3 font-weight-bold grey-text">Professional Dad</h6>
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
                        <p>+ 34 234 567 89</p>
                    </li>
                    <li><i class="fas fa-envelope fa-2x orange-text"></i>
                        <p>contact@myBichelchen.com</p>
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
