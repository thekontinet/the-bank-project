@extends(theme_path('layouts.app'))


@section('content')
@include(theme_path('layouts.header'))
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <h2>Contact</h2>
                <p>If you have an idea, complaint or need support, we would love to hear about it.</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

            <!-- Start Contact Area -->
            <section class="contact-area ptb-70">
                <div class="container">
                    <div class="section-title">
                        <h2>Drop us message for any query</h2>
                        <div class="bar"></div>
                        <p>Contact our support guys or make appointment with our professional financial consultants.</p>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-md-12">
                            <div class="contact-info">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <span>Address</span>
                                        {{config('app.contact_address')}}
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <span>Email</span>
                                        <a href="{{config('app.email')}}">{{config('app.email')}}</span></a>
                                    </li>

                                    <li>
                                        <div class="icon">
                                            <i class="fas fa-phone-volume"></i>
                                        </div>
                                        <span>Phone</span>
                                        <a href="tel:{{config('app.phone')}}">{{config('app.phone')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-7 col-md-12">
                            <div class="contact-form">
                                <form id="contactForm">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name" placeholder="Name">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email" placeholder="Email">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control" placeholder="Phone">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject" placeholder="Subject">
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message" placeholder="Your Message"></textarea>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="btn btn-primary">Send Message</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-map"><img src="assets/img/bg-map.png" alt="image"></div>
            </section>
            <!-- End Contact Area -->

            <!-- Start Account Create Area -->
            <section class="account-create-area">
                <div class="container">
                    <div class="account-create-content">
                        <h2>Apply for an account in minutes</h2>
                        <p>Get your Luvion account today!</p>
                        <a href="{{route('register')}}" class="btn btn-primary">Get Your {{config('app.name')}} Account</a>
                    </div>
                </div>
            </section>
            <!-- End Account Create Area -->
@include(theme_path('layouts.footer'))
@endsection
