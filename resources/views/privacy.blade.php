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
            <h1 class="font-weight-bold text-center h1 my-5">Privacy Policy</h1>
            <!--Section description-->
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Effective date: December 06, 2019</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead"><strong>myBichelchen</strong> ("us", "we", or "our") operates the <a href="https://mybichelchen.lu">https://mybichelchen.lu</a> website (the "Service").</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">This page informs you of our policies regarding the collection, use, and disclosure of personal data when you use our Service and the choices you have associated with that data.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We use your data to provide and improve the Service. By using the Service, you agree to the collection and use of information in accordance with this policy. Unless otherwise defined in this Privacy Policy, terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, accessible from <a href="https://mybichelchen.lu">https://mybichelchen.lu</a>.</p>


            <h2 class="font-weight-bold text-center h2 my-5">Information Collection And Use</h2>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We collect several different types of information for various purposes to provide and improve our Service to you.</p>

            <h3 class="font-weight-bold text-center h3 my-5">Types of Data Collected</h3>

            <h4 class="font-weight-bold text-center h4 my-5">Personal Data</h4>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">While using our Service, we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you ("Personal Data"). Personally identifiable information may include, but is not limited to: Email address, First name and last name, Phone number, Address, State, Province, ZIP/Postal code, City, and country.</p>

            <h4 class="font-weight-bold text-center h4 my-5">Usage Data</h4>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We may also collect information how the Service is accessed and used ("Usage Data"). This Usage Data may include information such as your computer's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>

            <h4 class="font-weight-bold text-center h4 my-5">Tracking & Cookies Data</h4>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We use cookies and similar tracking technologies to track the activity on our Service and hold certain information.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Cookies are files with small amount of data which may include an anonymous unique identifier. Cookies are sent to your browser from a website and stored on your device. Tracking technologies also used are beacons, tags, and scripts to collect and track information and to improve and analyze our Service.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use some portions of our Service.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Examples of Cookies we use:<br>
            <ul>
                <li><strong>Session Cookies.</strong> We use Session Cookies to operate our Service.</li>
                <li><strong>Preference Cookies.</strong> We use Preference Cookies to remember your preferences and various settings.</li>
                <li><strong>Security Cookies.</strong> We use Security Cookies for security purposes.</li>
            </ul></p>

            <h2 class="font-weight-bold text-center h2 my-5">Use of Data</h2>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">myBichelchen uses the collected data for various purposes:<br>
            <ul>
                <li>To provide and maintain the Service</li>
                <li>To notify you about changes to our Service</li>
                <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
                <li>To provide customer care and support</li>
                <li>To provide analysis or valuable information so that we can improve the Service</li>
                <li>To monitor the usage of the Service</li>
                <li>To detect, prevent and address technical issues</li>
            </ul>
            </p>

            <h2 class="font-weight-bold text-center h2 my-5">Transfer Of Data</h2>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Your information, including Personal Data, may be transferred to — and maintained on — computers located outside of your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from your jurisdiction.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">If you are located outside Luxembourg and choose to provide information to us, please note that we transfer the data, including Personal Data, to Luxembourg and process it there.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Your consent to this Privacy Policy followed by your submission of such information represents your agreement to that transfer.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">myBichelchen will take all steps reasonably necessary to ensure that your data is treated securely and in accordance with this Privacy Policy and no transfer of your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of your data and other personal information.</p>

            <h2 class="font-weight-bold text-center h2 my-5">Disclosure Of Data</h2>

            <h3 class="font-weight-bold text-center h3 my-5">Legal Requirements</h3>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">myBichelchen may disclose your Personal Data in the good faith belief that such action is necessary to:</p>
            <ul>
                <li>To comply with a legal obligation</li>
                <li>To protect and defend the rights or property of myBichelchen</li>
                <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
                <li>To protect the personal safety of users of the Service or the public</li>
                <li>To protect against legal liability</li>
            </ul>

            <h2 class="font-weight-bold text-center h2 my-5">Security Of Data</h2>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.</p>

            <h2 class="font-weight-bold text-center h2 my-5">Service Providers</h2>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We may employ third party companies and individuals to facilitate our Service ("Service Providers"), to provide the Service on our behalf, to perform Service-related services or to assist us in analyzing how our Service is used.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">These third parties have access to your Personal Data only to perform these tasks on our behalf and are obligated not to disclose or use it for any other purpose.</p>

            <h3 class="font-weight-bold text-center h3 my-5">Analytics</h3>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We may use third-party Service Providers to monitor and analyze the use of our Service.</p>

            <h2 class="font-weight-bold text-center h2 my-5">Links To Other Sites</h2>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Our Service may contain links to other sites that are not operated by us. If you click on a third party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>

            <h2 class="font-weight-bold text-center h2 my-5">Children's Privacy</h2>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">Our Service does not address anyone under the age of 18 ("Children").</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We do not knowingly collect personally identifiable information from anyone under the age of 18. If you are a parent or guardian and you are aware that your Children has provided us with Personal Data, please contact us. If we become aware that we have collected Personal Data from children without verification of parental consent, we take steps to remove that information from our servers.</p>


            <h2 class="font-weight-bold text-center h2 my-5">Changes To This Privacy Policy</h2>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "effective date" at the top of this Privacy Policy.</p>
            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>

            <p class="text-center grey-text mb-5 mx-auto w-responsive lead">If you have any questions about this Privacy Policy, please <a href="/contact">contact</a> us.</p>
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
