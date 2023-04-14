@extends(theme_path('layout.app'))


@section('content')
<div class="content-wrapper">
    <div class="breadcrumb-wrap bg-spring">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-3.png" alt="Image"
            class="br-shape-three moveHorizontal sm-none">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-4.png" alt="Image" class="br-shape-four moveVertical sm-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>Contact Us</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="About Us">Home</a></li>
                            <li>Login</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
                    <div class="breadcrumb-img">
                        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-5.png" alt="Image"
                            class="br-shape-five animationFramesTwo">
                        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
                        <img src="{{theme_asset('assets/')}}/img/breadcrumb/breadcrumb-1.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="contact-wrap pt-100">
        <div class="container">
            <div class="row justify-content-center pb-75">
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="flaticon-map"></i>
                        </span>
                        <div class="contact-info">
                            <h3>Our Location</h3>
                            <p>{{config('app.contact_address')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="flaticon-email-2"></i>
                        </span>
                        <div class="contact-info">
                            <h3>Email Us</h3>
                            <a href="mailto:{{config('app.email')}}"><span
                                    class="__cf_email__"
                                    data-cfemail="dfb7bab3b3b09fadbea7bef1bcb0b2">{{config('app.email')}}</span></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact-item">
                        <span class="contact-icon">
                            <i class="flaticon-phone-call"></i>
                        </span>
                        <div class="contact-info">
                            <h3>Call us</h3>
                            <a href="tel:{{config('app.phone')}}">{{config('app.phone')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="contact-form-area ptb-100 bg-albastor">
            <img src="{{theme_asset('assets')}}/img/contact-shape-1.png" alt="Image" class="contact-shape-one animationFramesTwo">
            <img src="{{theme_asset('assets')}}/img/contact-shape-2.png" alt="Image" class="contact-shape-two bounce">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1">
                        <div class="content-title style1 text-center mb-40">
                            <span>Send Us A Message</span>
                            <h2>Do You have Any Questions?</h2>
                        </div>
                        <div class="contact-form">
                            <form class="form-wrap" id="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="name" placeholder="Your Name*" id="name"
                                                required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" required
                                                placeholder="Your Email*" data-error="Please enter your email*">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="number" name="phone" id="phone" required
                                                placeholder="Phone Number"
                                                data-error="Please enter your phone number">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="msg_subject" placeholder="Subject"
                                                id="msg_subject" required
                                                data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group v1">
                                            <textarea name="message" id="message" placeholder="Your Messages.."
                                                cols="30" rows="10" required
                                                data-error="Please enter your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button type="submit" class="btn style1 w-100 d-block">Send Message
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
