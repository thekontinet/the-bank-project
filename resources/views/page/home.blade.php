@extends('layouts.front')

@section('content')
    <div class="page-wrapper">
        <header class="main-header main-header-style1">
            <!--Navigational Menu -->
            <nav class="main-menu main-menu-style1">
                <div class="clearfix main-menu__wrapper">
                    <div class="container">
                        <div class="main-menu__wrapper-inner">

                            <div class="main-menu-style1-left">
                                <div class="logo-box-style1">
                                    <a href="/">
                                        <x-application-logo/>
                                    </a>
                                </div>

                                <div class="main-menu-box">
                                    <a href="#" class="mobile-nav__toggler">
                                        <i class="icon-menu"></i>
                                    </a>
                                    <ul class="main-menu__list one-page-scroll-menu">

                                        <li class="scrollToLink">
                                            <a href="#home">Home</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="#about">About</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="#service">Services</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="#contact">Get In Touch</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <a href="/dashboard">Online Banking</a>
                                        </li>
                                        <li class="scrollToLink">
                                            <div id="google_translate_element"></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="main-menu-style1-right">
                                <div class="header-btn-one">
                                    <a href="{{route('login')}}">
                                        <span class="icon-home-button"></span>Login
                                    </a>
                                    <a class="style2" href="#">
                                        <span class="icon-payment"></span>Open an Account
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>

            <!--Start Main Header Style1 Bottom-->
            <div class="main-header-style1-bottom">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="update-box">
                            <div class="inner-title">
                                <span class="icon-megaphone"></span>
                                <h4>Updates:</h4>
                            </div>
                            <div class="text">
                                <p>Get upto 4%* on our Savings Account Balances with {{config('app.name')}}.</p>
                            </div>
                        </div>
                        <div class="slogan-box">
                            <p>Dear Customer, We have launched Video KYC facility for New customer to open savings ac
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Main Header Style1 Bottom-->

        </header>


        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->


        <!--Main Slider Start-->
        <section id="home" class="main-slider main-slider-style1">
            <div class="swiper-container thm-swiper__slider" data-swiper-options='{"slidesPerView": 1, "loop": true,
                "effect": "fade",
                "pagination": {
                "el": "#main-slider-pagination",
                "type": "bullets",
                "clickable": true
                },
                "navigation": {
                "nextEl": "#main-slider__swiper-button-next",
                "prevEl": "#main-slider__swiper-button-prev"
                },
                "autoplay": {
                "delay": 5000
                }}'>
                <div class="swiper-wrapper">

                    <!--Start Single Swiper Slide-->
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(assets/images/slides/slide-v1-1.jpg);">
                        </div>
                        <div class="main-slider-style1__shape1"
                            style="background-image: url(assets/images/shapes/slider-1-shape-1.png);">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider-content">
                                        <div class="main-slider-content__inner">
                                            <div class="big-title">
                                                <h2>Get Control of Your <br> Finances with Our Powerful <br> Online Banking App</h2>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    Our app is designed to make banking easy and convenient, <br>
                                                    with features like transaction tracking, account management,
                                                    and loan management all in one place. Plus, our user-friendly
                                                    interface makes it easy to stay on top of your finances no matter where you are.
                                                </p>
                                            </div>
                                            <div class="btns-box">
                                                <a class="btn-one" href="{{route('login')}}">
                                                    <span class="txt">
                                                        Online Banking
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Swiper Slide-->

                    <!--Start Single Swiper Slide-->
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(assets/images/slides/slide-v1-2.jpg);">
                        </div>
                        <div class="main-slider-style1__shape1"
                            style="background-image: url(assets/images/shapes/slider-1-shape-1.png);">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider-content">
                                        <div class="main-slider-content__inner">
                                            <div class="big-title">
                                                <h2>Experience Unmatched Security with <br> Our Online Banking Platform</h2>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    We take your security seriously, <br>
                                                    which is why our app is built with <br>
                                                    state-of-the-art encryption and multi-factor <br>
                                                    authentication to ensure your financial data is always protected.
                                                </p>
                                            </div>
                                            <div class="btns-box">
                                                <a class="btn-one" href="{{route('login')}}">
                                                    <span class="txt">
                                                        Online Banking
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Swiper Slide-->

                    <!--Start Single Swiper Slide-->
                    <div class="swiper-slide">
                        <div class="image-layer" style="background-image: url(assets/images/slides/slide-v1-3.jpg);">
                        </div>
                        <div class="main-slider-style1__shape1"
                            style="background-image: url(assets/images/shapes/slider-1-shape-1.png);">
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="main-slider-content">
                                        <div class="main-slider-content__inner">
                                            <div class="big-title">
                                                <h2>Stay Ahead of the Curve with Our Innovative Online Banking App</h2>
                                            </div>
                                            <div class="text">
                                                <p>
                                                    We're always looking for ways to improve our <br>
                                                    services and stay ahead of the competition. <br>
                                                    That's why we've developed an <br>
                                                    online banking app that's packed with
                                                    innovative features.
                                                </p>
                                            </div>
                                            <div class="btns-box">
                                                <a class="btn-one" href="{{route('login')}}">
                                                    <span class="txt">
                                                        Online Banking
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Swiper Slide-->


                </div>

                <!-- If we need navigation buttons -->
                <div class="main-slider__nav">
                    <div class="swiper-button-prev" id="main-slider__swiper-button-next">
                        <i class="icon-chevron left"></i>
                    </div>
                    <div class="swiper-button-next" id="main-slider__swiper-button-prev">
                        <i class="icon-chevron right"></i>
                    </div>
                </div>

            </div>
        </section>
        <!--Main Slider End-->

        <!--Start Intro Style1 Area-->
        <section id="about" class="intro-style1-area">
            <div class="container">
                <div class="row">

                    <div class="col-xl-6">
                        <div class="intro-style1-video-gallery">
                            <div class="intro-style1-video-gallery-bg"
                                style="background-image: url(assets/images/resources/intro-style1-video-gallery.jpg);">
                            </div>
                            <div class="intro-video-gallery-style1">
                                <div class="icon wow zoomIn animated" data-wow-delay="300ms" data-wow-duration="1500ms">
                                    <a class="video-popup" title="Video Gallery"
                                        href="/video/ubs-Intro.mp4">
                                        <span class="icon-play-button-1"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="intro-style1-content-box">
                            <div class="sec-title">
                                <h2>Known for Trust,<br> Honesty & Customer<br> Support</h2>
                            </div>
                            <div class="text">
                                <p>We take pride in being known for trust, honesty,
                                    and excellent customer support. Our top priority is to
                                    build lasting relationships with our customers by providing transparent,
                                    reliable financial services that meet their unique needs.</p>

                                <p>With a team of dedicated professionals who are committed to
                                    upholding the highest standards of integrity and service,
                                    we're here to help you achieve your financial goals and
                                    secure your financial future.</p></p>
                            </div>

                            <div class="row">
                                <!--Start Intro Style1 Single Box-->
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="intro-style1-single-box">
                                        <div class="img-box">
                                            <div class="img-box-inner">
                                                <img src="assets/images/resources/intro-style1-1.jpg" alt="">
                                            </div>
                                            <div class="overlay-text">
                                                <h3>Our Journey</h3>
                                            </div>
                                        </div>
                                        <div class="title-box">
                                            <h3><a href="#">For Over Four Decades Our Bank</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!--End Intro Style1 Single Box-->
                                <!--Start Intro Style1 Single Box-->
                                <div class="col-xl-6 col-lg-6 col-md-6">
                                    <div class="intro-style1-single-box">
                                        <div class="img-box">
                                            <div class="img-box-inner">
                                                <img src="assets/images/resources/intro-style1-2.jpg" alt="">
                                            </div>
                                            <div class="overlay-text">
                                                <h3>Our Team</h3>
                                            </div>
                                        </div>
                                        <div class="title-box">
                                            <h3><a href="#">Passion & Professional Management</a></h3>
                                        </div>
                                    </div>
                                </div>
                                <!--End Intro Style1 Single Box-->
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End Intro Style1 Area-->

        <!--Start Features Style1 Area-->
        <section class="features-style1-area">
            <div class="container">
                <div class="text-center sec-title">
                    <h2>Bank for a Better Tomorrow</h2>
                    <div class="sub-title">
                        <p>Committed to helping our customers succeed.</p>
                    </div>
                </div>
                <div class="features-style1-content">
                    <ul class="clearfix">
                        <!--Start Single Features Style1 Box-->
                        <li>
                            <div class="single-features-style1-box">
                                <div class="shape-left">
                                    <img src="assets/images/shapes/shape-1.png" alt="">
                                </div>
                                <div class="shape-bottom">
                                    <img src="assets/images/shapes/shape-2.png" alt="">
                                </div>
                                <div class="counting-box">
                                    <div class="counting-box-bg"
                                        style="background-image: url(assets/images/shapes/counting-box-bg.png);"></div>
                                    <h3>01</h3>
                                </div>
                                <div class="text-box">
                                    <h4>Fixed Depost</h4>
                                    <h3>A secured and lucrative Investment Option</h3>
                                    <p>Fixed Deposit (FD) is a type of investment that offers a higher rate of interest than a regular savings account. It is a secure and reliable investment option that is ideal for those who are looking to earn a higher return on their investment while keeping their money safe.</p>
                                    <div class="btn-box">
                                        <a href="#">
                                            Read More
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Features Style1 Box-->
                        <!--Start Single Features Style1 Box-->
                        <li>
                            <div class="single-features-style1-box">
                                <div class="shape-left">
                                    <img src="assets/images/shapes/shape-1.png" alt="">
                                </div>
                                <div class="shape-bottom">
                                    <img src="assets/images/shapes/shape-2.png" alt="">
                                </div>
                                <div class="counting-box">
                                    <div class="counting-box-bg"
                                        style="background-image: url(assets/images/shapes/counting-box-bg.png);"></div>
                                    <h3>02</h3>
                                </div>
                                <div class="text-box">
                                    <h4>Current Account</h4>
                                    <h3>Convenience and Flexibility for Your Everyday Banking Needs</h3>
                                    <p>A current account is an essential banking service that offers a wide range of features and benefits to meet your daily financial needs. It is designed for individuals and businesses who need access to their funds quickly and easily. At {{env('APP_NAME')}}, we offer a comprehensive range of current account options that provide maximum convenience and flexibility. Our current account services include online and mobile banking, overdraft facilities, debit cards, and much more.</p>
                                    <div class="btn-box">
                                        <a href="#">
                                            Read More
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Features Style1 Box-->
                        <!--Start Single Features Style1 Box-->
                        <li>
                            <div class="single-features-style1-box">
                                <div class="shape-left">
                                    <img src="assets/images/shapes/shape-1.png" alt="">
                                </div>
                                <div class="shape-bottom">
                                    <img src="assets/images/shapes/shape-2.png" alt="">
                                </div>
                                <div class="counting-box">
                                    <div class="counting-box-bg"
                                        style="background-image: url(assets/images/shapes/counting-box-bg.png);"></div>
                                    <h3>03</h3>
                                </div>
                                <div class="text-box">
                                    <h4>Savings Account</h4>
                                    <h3>Save and Grow Your Money with Ease</h3>
                                    <p>A savings account is a simple and effective way to save money while earning interest on your deposits. It is an ideal option for individuals who want to put aside some funds for a rainy day, a future goal or simply for the sake of savings. At {{env('APP_NAME')}}, we offer a variety of savings account options that provide competitive interest rates, low fees, and convenient access to your funds.</p>
                                    <div class="btn-box">
                                        <a href="#">
                                            Read More
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <!--End Single Features Style1 Box-->
                    </ul>
                </div>
            </div>
        </section>
        <!--End Features Style1 Area-->

        <!--Start Service Style1 Area-->
        <section id="service" class="service-style1-area">
            <div class="service-style1-bg" style="background-image: url(assets/images/backgrounds/service-style1.jpg);">
            </div>
            <div class="container">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="service-style1-title">
                            <div class="sec-title">
                                <h2>Banking For Your Needs</h2>
                                <div class="sub-title">
                                    <p>The bank that builds better relationships.</p>
                                </div>
                            </div>
                            <div class="get-assistant-box">
                                <a href="#"><span class="icon-chatting"></span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="service-style1-tab">
                            <!--Start Service Style1 Tab Button-->
                            <div class="service-style1-tab__button">
                                <ul class="clearfix tabs-button-box">
                                    <li data-tab="#individuals" class="tab-btn-item">
                                        <div class="inner">
                                            <div class="left">
                                                <h4>Banking for</h4>
                                                <h3>Individuals</h3>
                                            </div>
                                            <div class="right">
                                                <span class="icon-down-arrow"></span>
                                            </div>
                                        </div>
                                    </li>
                                    <li data-tab="#companies" class="tab-btn-item active-btn-item">
                                        <div class="inner">
                                            <div class="left">
                                                <h4>Banking for</h4>
                                                <h3>Companies</h3>
                                            </div>
                                            <div class="right">
                                                <span class="icon-down-arrow"></span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!--End Service Style1 Tab Button-->

                            <!--Start Tabs Content Box-->
                            <div class="tabs-content-box">

                                <!--Tab-->
                                <div class="tab-content-box-item" id="individuals">
                                    <div class="service-style1-tab-content-box-item">
                                        <div class="row">
                                            <!--Start Single Service Box Style1-->
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="single-service-box-style1">
                                                    <div class="icon">
                                                        <span class="icon-safebox"></span>
                                                    </div>
                                                    <h3><a href="#">Savings & CDs</a></h3>
                                                    <div class="border-box"></div>
                                                    <p>Save and Earn with our savings account</p>
                                                    <h6><span>*</span> Interest rate up to 18% p.a</h6>
                                                    <div class="btn-box">
                                                        <a href="#"><span class="icon-right-arrow"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Service Box Style1-->
                                            <!--Start Single Service Box Style1-->
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="single-service-box-style1">
                                                    <div class="icon">
                                                        <span class="icon-online"></span>
                                                    </div>
                                                    <h3><a href="#">Online & Mobile</a></h3>
                                                    <div class="border-box"></div>
                                                    <p>We online platform is always available 24/7</p>
                                                    <h6><span>*</span> Terms & Conditions</h6>
                                                    <div class="btn-box">
                                                        <a href="#"><span class="icon-right-arrow"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Service Box Style1-->
                                            <!--Start Single Service Box Style1-->
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="single-service-box-style1">
                                                    <div class="icon">
                                                        <span class="icon-loan"></span>
                                                    </div>
                                                    <h3><a href="#">Consumer Loans</a></h3>
                                                    <div class="border-box"></div>
                                                    <p>We offer loans with low interest rates</p>
                                                    <h6><span>*</span> Check today’s Interest Rates</h6>
                                                    <div class="btn-box">
                                                        <a href="#"><span class="icon-right-arrow"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Service Box Style1-->
                                        </div>
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab-content-box-item tab-content-box-item-active" id="companies">
                                    <div class="service-style1-tab-content-box-item">
                                        <div class="row">
                                            <!--Start Single Service Box Style1-->
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="single-service-box-style1">
                                                    <div class="icon">
                                                        <span class="icon-safebox"></span>
                                                    </div>
                                                    <h3><a href="#">Savings & CDs</a></h3>
                                                    <div class="border-box"></div>
                                                    <p>Save and Earn with our savings account</p>
                                                    <h6><span>*</span> Interest rate up to 18% p.a</h6>
                                                    <div class="btn-box">
                                                        <a href="#"><span class="icon-right-arrow"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Service Box Style1-->
                                            <!--Start Single Service Box Style1-->
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="single-service-box-style1">
                                                    <div class="icon">
                                                        <span class="icon-online"></span>
                                                    </div>
                                                    <h3><a href="#">Online & Mobile</a></h3>
                                                    <div class="border-box"></div>
                                                    <p>We online platform is always available 24/7</p>
                                                    <h6><span>*</span> Terms & Conditions</h6>
                                                    <div class="btn-box">
                                                        <a href="#"><span class="icon-right-arrow"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Service Box Style1-->
                                            <!--Start Single Service Box Style1-->
                                            <div class="col-xl-4 col-lg-4">
                                                <div class="single-service-box-style1">
                                                    <div class="icon">
                                                        <span class="icon-loan"></span>
                                                    </div>
                                                    <h3><a href="#">Consumer Loans</a></h3>
                                                    <div class="border-box"></div>
                                                    <p>We offer loans with low interest rates</p>
                                                    <h6><span>*</span> Check today’s Interest Rates</h6>
                                                    <div class="btn-box">
                                                        <a href="#"><span class="icon-right-arrow"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--End Single Service Box Style1-->
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--End Tabs Content Box-->

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-12">
                        <div class="text-center service-style1__btns-box">
                            <a class="btn-one" href="#">
                                <span class="txt">View All Services</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!--End Service Style1 Area-->

        <!--Start Features Style3 Area-->
        <section class="features-style3-area">
            <div class="container">
                <div class="row">

                    <div class="col-xl-6">
                        <div class="features-style3-img-box">
                            <div class="inner-img">
                                <img class="paroller" src="assets/images/resources/features-style3-img.png" alt="">
                            </div>
                            <div class="icon-holder float-bob-y">
                                <span class="icon-interest-rate"></span>
                            </div>
                            <div class="icon-holder two">
                                <span class="icon-online-shop"></span>
                            </div>
                            <div class="icon-holder three">
                                <span class="icon-theater"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="features-style3-content">
                            <div class="sec-title">
                                <h2>Request Your<br> Card and For Online Payment</h2>
                                <div class="sub-title">
                                    <p>Request and get an instant debit or credit card for flexible and secured digital transaction</p>
                                </div>
                            </div>
                            <div class="text-box">
                                <ul>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <p>Available for transaction 24/7</p>
                                    </li>
                                    <li>
                                        <div class="icon">
                                            <span class="icon-checkbox-mark"></span>
                                        </div>
                                        <p>Safe and Secure</p>
                                    </li>
                                </ul>
                                <div class="apply-credit-card">
                                    <h3>Apply for Credit Card</h3>
                                    <form id="apply-credit-card" name="apply-credit-card" action="/cards" method="get">
                                        <div class="button-box">
                                            <button class="btn-one" type="submit" data-loading-text="Please wait...">
                                                <span class="txt">Request Now</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--End Features Style3 Area-->

        <!--Start Money Exchange Rates Area-->
        <section class="money-exchange-value-area">
            <div class="money-exchange-value-area-bg"
                style="background-image: url(assets/images/backgrounds/money-exchange-value.jpg);"></div>
            <div class="container">
                <div class="text-center sec-title">
                    <h2>Foreign Exchange Rates</h2>
                    <div class="sub-title">
                        <p>Denouncing pleasure & praising pain was born.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="money-exchange-value-tab">

                            <!--Start Money Exchange Value Tab Button-->
                            <div class="money-exchange-value-tab__button">
                                <ul class="tabs-button-box">
                                    <li data-tab="#money-send-receive" class="tab-btn-item active-btn-item">
                                        <h3>Money Send & Receive</h3>
                                    </li>
                                    <li data-tab="#load-redeem-forex-card" class="tab-btn-item">
                                        <h3>Load & Redeem Forex Card</h3>
                                    </li>
                                </ul>
                                <div class="right">
                                    <a href="#"><span class="icon-menu"></span>Click to Get Assistant</a>
                                </div>
                            </div>
                            <!--End Money Exchange Value Tab Button-->

                            <!--Start Tabs Content Box-->
                            <div class="tabs-content-box">
                                <!--Tab-->
                                <div class="tab-content-box-item tab-content-box-item-active" id="money-send-receive">
                                    <div class="money-exchange-value-tab-content-box-item">
                                        <div class="row">

                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>usd</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>79.89</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>76.54</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>sek</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>8.20</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>7.25</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>gbp</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>101.88</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>96.55</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-4.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>jpy</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>62.82</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>58.46</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-5.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>aud</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>57.52</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>54.21</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-6.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>cad</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>63.41</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>59.75</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->

                                        </div>
                                    </div>
                                </div>

                                <!--Tab-->
                                <div class="tab-content-box-item" id="load-redeem-forex-card">
                                    <div class="money-exchange-value-tab-content-box-item">
                                        <div class="row">

                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-4.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>jpy</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>62.82</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>58.46</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-5.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>aud</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>57.52</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>54.21</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-6.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>cad</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>63.41</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>59.75</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-1.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>usd</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>79.89</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>76.54</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-2.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>sek</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>8.20</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>7.25</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->
                                            <!--Start Single Money Exchange Value-->
                                            <div class="col-xl-2 col-lg-4 col-md-4">
                                                <div class="single-money-exchange-value">
                                                    <div class="flag-box">
                                                        <div class="flag-box-inner">
                                                            <img src="assets/images/resources/flag-3.png" alt="">
                                                        </div>
                                                    </div>
                                                    <h3>gbp</h3>
                                                    <ul>
                                                        <li>
                                                            <div class="left">
                                                                <p>Send</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>101.88</p>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="left">
                                                                <p>Receive</p>
                                                                <span>:</span>
                                                            </div>
                                                            <div class="right">
                                                                <p>96.55</p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!--End Single Money Exchange Value-->

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!--End Tabs Content Box-->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Money Exchange Rates Area-->


        <!--Start Features Style2 Area-->
        <section class="features-style2-area">
            <div class="container">
                <div class="text-center sec-title">
                    <h2>Emergency Service Requests</h2>
                    <div class="sub-title">
                        <p>List of banking service requests all in one place.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="features-style2-content">

                            <!--Start Features Style2 Tab-->
                            <div class="features-style2-tab">
                                <!--Start Features Style2 Tab Button-->
                                <div class="features-style2-tab__button">
                                    <ul class="owl-carousel owl-theme thm-owl__carousel features-style2-carousel owl-nav-style-one tabs-button-box"
                                        data-owl-options='{
                                                "loop": false,
                                                "autoplay": false,
                                                "margin": 0,
                                                "nav": true,
                                                "dots": false,
                                                "smartSpeed": 500,
                                                "autoplayTimeout": 10000,
                                                "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                "responsive": {
                                                        "0": {
                                                            "items": 1
                                                        },
                                                        "768": {
                                                            "items": 2
                                                        },
                                                        "992": {
                                                            "items": 3
                                                        },
                                                        "1200": {
                                                            "items": 4
                                                        }
                                                    }
                                                }'>

                                        <li data-tab="#tabid11" class="clearfix tab-btn-item active-btn-item">
                                            <div class="single-features-box-style2">
                                                <div class="icon">
                                                    <span class="icon-credit-card"></span>
                                                </div>
                                                <div class="title">
                                                    <h3><a href="#">Credit / Debit Card<br> Related</a></h3>
                                                </div>
                                                <div class="arrow-button">
                                                    <a href="#">
                                                        <span class="icon-chevron"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-tab="#tabid22" class="clearfix tab-btn-item">
                                            <div class="single-features-box-style2">
                                                <div class="icon">
                                                    <span class="icon-computer"></span>
                                                </div>
                                                <div class="title">
                                                    <h3><a href="#">Mobile / Internet<br> Banking</a></h3>
                                                </div>
                                                <div class="arrow-button">
                                                    <a href="#">
                                                        <span class="icon-chevron"></span>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!--End Features Style2 Tab Button-->

                                <!--Start Tabs Content Box-->
                                <div class="tabs-content-box">
                                    <!--Tab-->
                                    <div class="tab-content-box-item tab-content-box-item-active" id="tabid11">
                                        <div class="features-style2-tab-content-box-item">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="features-style2-text-box">
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    Block Debit / ATM Card
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Generate Debit Card Pin Number
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Unlock Debit / ATM Card
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Reissue Lost Debit / ATM Card
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="features-style2-banner-box">
                                                        <div class="text-box">
                                                            <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2"
                                                                data-owl-options='{
                                                                        "loop": true,
                                                                        "autoplay": false,
                                                                        "margin": 0,
                                                                        "nav": false,
                                                                        "dots": true,
                                                                        "smartSpeed": 500,
                                                                        "autoplayTimeout": 10000,
                                                                        "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                                        "responsive": {
                                                                                "0": {
                                                                                    "items": 1
                                                                                },
                                                                                "768": {
                                                                                    "items": 1
                                                                                },
                                                                                "992": {
                                                                                    "items": 1
                                                                                },
                                                                                "1200": {
                                                                                    "items": 1
                                                                                }
                                                                            }
                                                                        }'>

                                                                <!--Start Single Item-->
                                                                <div class="single-item">
                                                                    <span class="icon-headphones"></span>
                                                                    <h4>Call for</h4>
                                                                    <h3>Private Banking</h3>
                                                                    <h2>
                                                                        <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                                                    </h2>
                                                                </div>
                                                                <!--End Single Item-->
                                                                <!--Start Single Item-->
                                                                <div class="single-item">
                                                                    <span class="icon-headphones"></span>
                                                                    <h4>Call for</h4>
                                                                    <h3>Private Banking</h3>
                                                                    <h2>
                                                                        <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                                                    </h2>
                                                                </div>
                                                                <!--End Single Item-->
                                                                <!--Start Single Item-->
                                                                <div class="single-item">
                                                                    <span class="icon-headphones"></span>
                                                                    <h4>Call for</h4>
                                                                    <h3>Private Banking</h3>
                                                                    <h2>
                                                                        <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                                                    </h2>
                                                                </div>
                                                                <!--End Single Item-->

                                                            </div>
                                                        </div>
                                                        <div class="img-box">
                                                            <div class="img-box-bg"
                                                                style="background-image: url(assets/images/resources/features-style2-banner-1.jpg);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Tab-->
                                    <div class="tab-content-box-item" id="tabid22">
                                        <div class="features-style2-tab-content-box-item">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <div class="features-style2-text-box">
                                                        <ul>
                                                            <li>
                                                                <a href="#">
                                                                    Mobile / Internet Banking
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Generate Debit Card Pin Number
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Unlock Debit / ATM Card
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    Reissue Lost Debit / ATM Card
                                                                    <span class="icon-right-arrow"></span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <div class="features-style2-banner-box">
                                                        <div class="text-box">
                                                            <div class="owl-carousel owl-theme thm-owl__carousel features-style2-banner-carousel owl-dot-style2"
                                                                data-owl-options='{
                                                                        "loop": true,
                                                                        "autoplay": false,
                                                                        "margin": 0,
                                                                        "nav": false,
                                                                        "dots": true,
                                                                        "smartSpeed": 500,
                                                                        "autoplayTimeout": 10000,
                                                                        "navText": ["<span class=\"left icon-right-arrow\"></span>","<span class=\"right icon-right-arrow\"></span>"],
                                                                        "responsive": {
                                                                                "0": {
                                                                                    "items": 1
                                                                                },
                                                                                "768": {
                                                                                    "items": 1
                                                                                },
                                                                                "992": {
                                                                                    "items": 1
                                                                                },
                                                                                "1200": {
                                                                                    "items": 1
                                                                                }
                                                                            }
                                                                        }'>

                                                                <!--Start Single Item-->
                                                                <div class="single-item">
                                                                    <span class="icon-headphones"></span>
                                                                    <h4>Call for</h4>
                                                                    <h3>Private Banking</h3>
                                                                    <h2>
                                                                        <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                                                    </h2>
                                                                </div>
                                                                <!--End Single Item-->
                                                                <!--Start Single Item-->
                                                                <div class="single-item">
                                                                    <span class="icon-headphones"></span>
                                                                    <h4>Call for</h4>
                                                                    <h3>Private Banking</h3>
                                                                    <h2>
                                                                        <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                                                    </h2>
                                                                </div>
                                                                <!--End Single Item-->
                                                                <!--Start Single Item-->
                                                                <div class="single-item">
                                                                    <span class="icon-headphones"></span>
                                                                    <h4>Call for</h4>
                                                                    <h3>Private Banking</h3>
                                                                    <h2>
                                                                        <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                                                    </h2>
                                                                </div>
                                                                <!--End Single Item-->

                                                            </div>
                                                        </div>
                                                        <div class="img-box">
                                                            <div class="img-box-bg"
                                                                style="background-image: url(assets/images/resources/features-style2-banner-2.jpg);">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--End Tabs Content Box-->
                            </div>
                            <!--End Features Style2 Tab-->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Features Style2 Area-->

        <!--Start Main Contact Form Area-->
        <section id="contact" class="main-contact-form-area pdb100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10">
                        <div class="contact-info-box-style1">
                            <div class="box1"></div>
                            <div class="title">
                                <h2>Get Support for<br> any Queries or Complaints</h2>
                                <p>Committed to helping you meet all your banking needs.</p>
                            </div>

                            <ul class="contact-info-1">
                                <li>
                                    <div class="icon">
                                        <span class="icon-map"></span>
                                    </div>
                                    <div class="text">
                                        <p>Corporate Office</p>
                                        <h3>{{env('APP_CONTACT_ADDRESS')}}</h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-clock"></span>
                                    </div>
                                    <div class="text">
                                        <p>Office Hours</p>
                                        <h3>Mon - Fri: 9.00am to 5.00pm</h3>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-phone"></span>
                                    </div>
                                    <div class="text">
                                        <p>Front Desk</p>
                                        <h3><a href="tel:123456789">{{env('APP_PHONE')}}</a></h3>
                                        <h3><a href="mailto:yourmail@email.com">{{env('APP_EMAIL')}}</a></h3>
                                    </div>
                                </li>
                            </ul>

                            <div class="bottom-box">
                                <div class="btn-box">
                                    <a href="#"><i class="fas fa-arrow-down"></i> Customer Care</a>
                                </div>
                                <div class="footer-social-link-style1">
                                    <ul class="clearfix">
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-2">
                    </div>

                </div>
            </div>
        </section>
        <!--End Main Contact Form Area-->


        <!--Start footer area -->
        <footer class="footer-area">
            <div class="right-shape">
                <img src="assets/images/shapes/footer-right-shape.png" alt="">
            </div>

            <!--Start Footer Top-->
            <div class="footer-top">
                <div class="lef-shape">
                    <span class="icon-origami"></span>
                </div>
                <div class="container">
                    <div class="row">
                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 single-widget">
                            <div class="single-footer-widget single-footer-widget--link-box">
                                <div class="title">
                                    <h3>Online</h3>
                                </div>
                                <div class="footer-widget-links">
                                    <ul>
                                        <li><a href="#">Mobile Banking</a></li>
                                        <li><a href="#">Internet Banking</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End single footer widget-->

                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 single-widget">
                            <div class="single-footer-widget single-footer-widget--link-box">
                                <div class="title">
                                    <h3>About Us</h3>
                                </div>
                                <div class="footer-widget-links">
                                    <ul>
                                        <li><a href="#">Our Story</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End single footer widget-->

                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 single-widget">
                            <div class="single-footer-widget single-footer-widget--link-box">
                                <div class="title">
                                    <h3>Services</h3>
                                </div>
                                <div class="footer-widget-links">
                                    <ul>
                                        <li><a href="#">Savings Account</a></li>
                                        <li><a href="#">Current Account</a></li>
                                        <li><a href="#">Deposits</a></li>
                                        <li><a href="#">Cards</a></li>
                                        <li><a href="#">Payments</a></li>
                                        <li><a href="#">Insurance</a></li>
                                        <li><a href="#">Locker Facility</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End single footer widget-->
                    </div>
                </div>
            </div>
            <!--End Footer Top-->

            <!--Start Footer-->
            <div class="footer">
                <div class="container">
                    <div class="row">

                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="single-footer-widget marbtm50">
                                <div class="our-company-info">
                                    <div class="footer-logo-style1">
                                        <x-application-logo-dark/>
                                    </div>
                                    <div class="copyright-text">
                                        <p>
                                            Copyright &copy; {{now()->format('Y')}} <a href="/">{{config('app.name')}}</a> Licensed by the<br>
                                            Central Bank of United States.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End single footer widget-->

                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="single-footer-widget marbtm50">
                                <div class="footer-widget-contact-info">
                                    <ul>
                                        <li>
                                            <h3>
                                                <a href="tel:{{env('APP_PHONE')}}">{{env('APP_PHONE')}}</a>
                                            </h3>
                                            <p>Customer Care</p>
                                        </li>
                                        <li>
                                            <h3>Mon - Fri: 9.00am to 5.00pm</h3>
                                            <p>Banking Hours</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End single footer widget-->

                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                            <div class="single-footer-widget">
                                <div class="single-footer-widget-right-colum">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                Online Banking
                                                <span class="icon-download"></span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                Contact Us
                                                <span class="icon-feedback"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--End single footer widget-->

                    </div>
                </div>
            </div>
            <!--End Footer-->

            <div class="footer-bottom">
                <div class="container">
                    <div class="bottom-inner">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="#">Disclaimer</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Online Security Tips</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </footer>
        <!--End footer area-->
    </div>
    <!-- /.page-wrapper -->
@endsection
