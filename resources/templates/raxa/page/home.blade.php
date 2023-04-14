<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/themes/raxa/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/flaticon.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/remixicon.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/odometer.min.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/fancybox.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/aos.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/style.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/dark-theme.css">
    <link rel="stylesheet" href="/themes/raxa/assets/css/responsive.css">
    <title>Raxa - Money Transfer & Banking HTML Template</title>
    <link rel="icon" type="image/png" href="/themes/raxa/assets/img/favicon.png">
</head>

<body>

    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>


    <div class="switch-theme-mode">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div>


    <div class="page-wrapper">

        <header class="header-wrap style1">
            <div class="header-top">
                <button type="button" class="close-sidebar">
                    <i class="ri-close-fill"></i>
                </button>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="header-top-left">
                                <ul class="contact-info list-style">
                                    <li>
                                        <i class="flaticon-call"></i>
                                        <a href="tel:02459271449">{{config('app.phone')}}</a>
                                    </li>
                                    <li>
                                        <i class="flaticon-email-1"></i>
                                        <a href="{{config('app.email')}}"><span class="__cf_email__">{{config('app.email')}}</span></a>
                                    </li>
                                    <li>
                                        <i class="flaticon-pin"></i>
                                        <p>{{config('app.contact_address')}}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="header-top-right">
                                <div class="select-lang">
                                    <i class="ri-global-line"></i>
                                    <div class="navbar-option-item navbar-language dropdown language-option">
                                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="lang-name"></span>
                                        </button>
                                        <div class="dropdown-menu language-dropdown-menu">
                                            <a class="dropdown-item" href="#">
                                                <img src="/themes/raxa/assets/img/uk.png" alt="flag">
                                                English
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <img src="/themes/raxa/assets/img/china.png" alt="flag">
                                                简体中文
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <img src="/themes/raxa/assets/img/uae.png" alt="flag">
                                                العربيّة
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="index.html">
                            <x-application-logo-dark/>
                        </a>
                        <div class="collapse navbar-collapse main-menu-wrap" id="navbarSupportedContent">
                            <div class="menu-close xl-none">
                                <a href="javascript:void(0)"> <i class="ri-close-line"></i></a>
                            </div>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item  has-dropdown">
                                    <a href="#" class="nav-link active">
                                        Home
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('page', 'about')}}" class="nav-link">
                                        About Us
                                    </a>
                                </li>
                                <li class="nav-item has-dropdown">
                                    <a href="{{route('page', 'service')}}" class="nav-link">
                                        Service
                                    </a>
                                </li>
                                <li class="nav-item has-dropdown">
                                    <a href="{{route('dashboard')}}" class="nav-link">
                                        Online Banking
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('page', 'contact')}}" class="nav-link">Contact Us</a>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item xl-none">
                                        <a href="{{route('register')}}" class="btn style1">Register Now</a>
                                    </li>
                                @endif
                            </ul>
                            <div class="others-options  lg-none">
                                <div class="header-btn lg-none">
                                    @if (Route::has('register'))
                                        <a href="{{route('register')}}" class="btn style1">Register Now</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </nav>
                    <div class="mobile-bar-wrap">
                        <div class="mobile-sidebar me-4">
                            <i class="ri-menu-4-line"></i>
                        </div>
                        <div class="mobile-menu xl-none">
                            <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <section class="hero-wrap style3 bg-squeeze">
            <img src="/themes/raxa/assets/img/hero/hero-shape-10.png" alt="Image" class="hero-shape-one">
            <img src="/themes/raxa/assets/img/hero/hero-shape-15.png" alt="Image" class="hero-shape-two">
            <img src="/themes/raxa/assets/img/hero/hero-shape-14.png" alt="Image" class="hero-shape-three">
            <img src="/themes/raxa/assets/img/hero/hero-shape-11.png" alt="Image" class="hero-shape-four animationFramesTwo">
            <div class="hero-slider-one owl-carousel">
                <div class="hero-slide-item">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="col-md-6">
                                <div class="hero-content" data-speed="0.10" data-revert="true">
                                    <span>Flex Banking</span>
                                    <h1>Your trusted finanacial partner</h1>
                                    <p> we are committed to providing our customers with the highest quality of financial services. Whether you need a savings account, a loan, or investment advice, our team of experienced professionals is here to help you achieve your financial goals.</p>
                                    <div class="hero-btn">
                                        <a href="{{route('register')}}" class="btn style1">Create Account</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero-img-wrap">
                                    <img src="/themes/raxa/assets/img/hero/hero-shape-13.png" alt="Image"
                                        class="hero-shape-five bounce">
                                    <img src="/themes/raxa/assets/img/hero/hero-shape-12.png" alt="Image"
                                        class="hero-shape-six moveHorizontal">
                                    <img src="/themes/raxa/assets/img/hero/hero-slide-1.png" alt="Image" class="hero-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide-item">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="col-md-6">
                                <div class="hero-content" data-speed="0.10" data-revert="true">
                                    <span>Online Payment System</span>
                                    <h1>Secured &amp; Easy Online Payment Solution </h1>
                                    <p> we are committed to providing our customers with the highest quality of financial services. Whether you need a savings account, a loan, or investment advice, our team of experienced professionals is here to help you achieve your financial goals.</p>
                                    <div class="hero-btn">
                                        <a href="{{route('register')}}" class="btn style1">Create Account</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero-img-wrap">
                                    <img src="/themes/raxa/assets/img/hero/hero-shape-13.png" alt="Image"
                                        class="hero-shape-five bounce">
                                    <img src="/themes/raxa/assets/img/hero/hero-shape-12.png" alt="Image"
                                        class="hero-shape-six moveHorizontal">
                                    <img src="/themes/raxa/assets/img/hero/hero-slide-2.png" alt="Image" class="hero-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero-slide-item">
                    <div class="container">
                        <div class="row gx-5 align-items-center">
                            <div class="col-md-6">
                                <div class="hero-content" data-speed="0.10" data-revert="true">
                                    <span>Global Money Transfer</span>
                                    <h1>Move Your Money In Easy Secured Steps</h1>
                                    <p> we are committed to providing our customers with the highest quality of financial services. Whether you need a savings account, a loan, or investment advice, our team of experienced professionals is here to help you achieve your financial goals.</p>
                                    <div class="hero-btn">
                                        <a href="{{route('register')}}" class="btn style1">Create Account</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="hero-img-wrap">
                                    <img src="/themes/raxa/assets/img/hero/hero-shape-13.png" alt="Image"
                                        class="hero-shape-five bounce">
                                    <img src="/themes/raxa/assets/img/hero/hero-shape-12.png" alt="Image"
                                        class="hero-shape-six moveHorizontal">
                                    <img src="/themes/raxa/assets/img/hero/hero-slide-3.png" alt="Image" class="hero-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="service-charge-wrap bg-stratos ptb-100">
            <div class="container">
                <form action="#" class="charge-form">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="send_money">Your Send Money</label>
                                <input type="text" id="send_money" name="send_money" value="$1000" disabled>
                                <select>
                                    <option value="1">USD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="form-group">
                                <label for="recieved_money">Recipient Gets</label>
                                <input type="text" id="recieved_money" name="recieved_money" value="$999.9" disabled>
                                <select>
                                    <option value="1">USD</option>
                                    <option value="2">EURO</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="form-group form-btn">
                                <button type="submit" class="btn style1 w-100 d-block">Get Estimation</button>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <p><span>$0.1</span> Transition Fees</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <section class="feature-wrap pt-100 pb-75">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="feature-card style3">
                            <div class="feature-info">
                                <div class="feature-title">
                                    <span><img src="/themes/raxa/assets/img/feature/feature-icon-1.png" alt="Image"></span>
                                    <h3>Create An Account</h3>
                                </div>
                                <p>Creating an account with our bank website is quick and easy. Simply visit our website and click on the "Sign Up" or "Create Account" button. Fill in the required information such as your name, email address, and desired password. Verify your email address to complete the process. Once you've created your account, you'll be ready to start using our bank services.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="feature-card style3">
                            <div class="feature-info">
                                <div class="feature-title">
                                    <span><img src="/themes/raxa/assets/img/feature/feature-icon-2.png" alt="Image"></span>
                                    <h3>Attach bank Account</h3>
                                </div>
                                <p>Next, you'll need to create your bank account on our website. This will enable you to easily transfer funds between your bank account and your website account. Simply follow the on-screen prompts to link your bank account securely. Our website uses the latest encryption technology to ensure the safety of your personal and financial information.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="feature-card style3">
                            <div class="feature-info">
                                <div class="feature-title">
                                    <span><img src="/themes/raxa/assets/img/feature/feature-icon-3.png" alt="Image"></span>
                                    <h3>Send Money</h3>
                                </div>
                                <p>Once you've created an account and attached your bank account, you can start sending money with ease. Our website makes it simple to transfer funds to anyone, anywhere, at any time. Just log in to your account, enter the recipient's information and the amount you want to send, and the transaction will be completed securely and quickly. With our bank website, sending money has never been easier or more convenient.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="why-choose-wrap style1 pb-100 bg-bunting">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="wh-img-wrap">
                            <img src="/themes/raxa/assets/img/why-choose-us/wh-img-1.png" alt="Image">
                            <img class="wh-shape-one bounce" src="/themes/raxa/assets/img/why-choose-us/wh-shape-1.png"
                                alt="Image">
                            <img class="wh-shape-two animationFramesTwo" src="/themes/raxa/assets/img/why-choose-us/wh-shape-2.png"
                                alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="wh-content">
                            <div class="content-title style1">
                                <span>Why Choose Us</span>
                                <h2>Get World Class &amp; Fastest Online Payment Service</h2>
                                <p>At our bank, we are dedicated to providing our customers with world-class financial services. We understand the importance of fast, reliable, and secure payment services in today's fast-paced world. That's why we offer the fastest online payment service available, with cutting-edge technology that ensures your transactions are completed quickly and securely.</p>
                            </div>
                            <div class="feature-item-wrap">
                                <div class="feature-item">
                                    <span class="feature-icon">
                                        <i class="flaticon-graph"></i>
                                    </span>
                                    <div class="feature-text">
                                        <h3>Low Costing</h3>
                                        <p>We are committed to providing our customers with a comprehensive range of financial services that are not only affordable but also safe and secure. We understand that cost is a significant consideration for many of our customers, which is why we offer low-cost financial solutions that are designed to meet your specific needs.</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon">
                                        <i class="flaticon-loan-1"></i>
                                    </span>
                                    <div class="feature-text">
                                        <h3>Safe &amp; Secure</h3>
                                        <p>Our bank is committed to keeping your financial information safe and secure at all times. We use state-of-the-art security measures to ensure that your personal and financial information is protected from unauthorized access, theft, and fraud. You can be confident that your information is safe when you bank with us.</p>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <span class="feature-icon">
                                        <i class="flaticon-computer"></i>
                                    </span>
                                    <div class="feature-text">
                                        <h3>Live Support</h3>
                                        <p>We also offer live support to our customers, so you can get help and support whenever you need it. Our team of experienced professionals is available 24/7 to answer your questions and provide you with the support you need. Whether you need help with your account or have a question about a transaction, our team is here to help you.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="counter-wrap">
            <div class="container">
                <div class="counter-card-wrap">
                    <div class="counter-card">
                        <div class="counter-text">
                            <div class="counter-num">
                                <span class="odometer" data-count="15837"></span>
                            </div>
                            <p>Happy Customers</p>
                        </div>
                    </div>
                    <div class="counter-card">
                        <div class="counter-text">
                            <div class="counter-num">
                                <span class="odometer" data-count="12"></span>
                            </div>
                            <p>Years in Banking</p>
                        </div>
                    </div>
                    <div class="counter-card">
                        <div class="counter-text">
                            <div class="counter-num">
                                <span class="odometer" data-count="2597"></span>
                            </div>
                            <p>Investors</p>
                        </div>
                    </div>
                    <div class="counter-card">
                        <div class="counter-text">
                            <div class="counter-num">
                                <span class="odometer" data-count="40467"></span>
                            </div>
                            <p>Successful Projects</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="service-wrap style3 ptb-100 bg-rock">
            <div class="container">
                <img src="/themes/raxa/assets/img/service-shape-1.png" alt="Image" class="service-shape-one">
                <img src="/themes/raxa/assets/img/service-shape-2.png" alt="Image" class="service-shape-two">
                <div class="section-title style1 text-center mb-40">
                    <span>Our Services</span>
                    <h2 class="text-white">We Offer Great Services</h2>
                </div>
                <div class="row gx-5 align-items-center">
                    <div class="col-md-6">
                        <div class="service-card style3">
                            <span class="service-icon">
                                <i class="flaticon-payment-method"></i>
                            </span>
                            <div class="service-info">
                                <h3><a href="#">Online Banking</a></h3>
                                <p>Our online banking service is designed to provide you with convenient access to your account anytime and anywhere. With our user-friendly online banking platform, you can manage your account, check your balance, view transaction history, transfer funds, pay bills, and more. Our online banking service is secure, and you can be confident that your personal and financial information is always protected.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-card style3">
                            <span class="service-icon">
                                <i class="flaticon-computer"></i>
                            </span>
                            <div class="service-info">
                                <h3><a href="#">Secure Payment</a></h3>
                                <p>Our secure payment service is designed to give you peace of mind when making transactions. We use the latest encryption technology to ensure that your financial information is protected at all times. Our payment service is fast and reliable, and you can make payments to anyone, anywhere, at any time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-card style3">
                            <span class="service-icon">
                                <i class="flaticon-credit-card"></i>
                            </span>
                            <div class="service-info">
                                <h3><a href="#">Saving Account</a></h3>
                                <p>Our saving account is designed to help you save for your future financial goals. We offer competitive interest rates and flexible terms, allowing you to choose the saving plan that best fits your needs. With our saving account, you can watch your savings grow over time and achieve your financial goals.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="service-card style3">
                            <span class="service-icon">
                                <i class="flaticon-loan-1"></i>
                            </span>
                            <div class="service-info">
                                <h3><a href="#">Personal Savings</a></h3>
                                <p>Our personal savings service is designed to help you achieve your financial goals, whatever they may be. Whether you're saving for a down payment on a house, a child's education, or a dream vacation, our personal savings service can help. We offer a range of options and competitive interest rates to help you achieve your goals faster. Our experienced professionals are always available to help you choose the right savings plan and answer any questions you may have.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-20">
                    <a href="{{route('page', 'service')}}" class="btn style1">View All Services</a>
                </div>
            </div>
        </section>


        <section class="shopping-wrap ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-12 order-lg-1 order-2">
                        <div class="shopping-content">
                            <img src="/themes/raxa/assets/img/shopping/shopping-shape-1.png" alt="Image"
                                class="shopping-shape-one moveHorizontal">
                            <img src="/themes/raxa/assets/img/shopping/shopping-shape-2.png" alt="Image"
                                class="shopping-shape-two bounce">
                            <div class="content-title style1 ">
                                <span>Online Shopping</span>
                                <h2>Online Banking Payments</h2>
                                <p>With our online banking payment service, you can pay bills, transfer money between accounts, make loan payments, and more. Our payment service is user-friendly, with an intuitive interface that makes it easy for you to manage your payments and transactions. You can schedule recurring payments or make one-time payments with ease.</p>
                            </div>
                            <ul class="content-feature-list list-style">
                                <li><i class="ri-check-double-line"></i>Cards that work all across the world.</li>
                                <li><i class="ri-check-double-line"></i>Highest Returns on your investments.</li>
                                <li><i class="ri-check-double-line"></i>No ATM fees. No minimum balance. No overdrafts.
                                </li>
                            </ul>
                            @if (Route::has('register'))
                                <a href="{{route('register')}}" class="btn style1">Signup Today</a>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-12 order-lg-2 order-1">
                        <div class="shopping-img-wrap">
                            <img src="/themes/raxa/assets/img/shopping/shopping-1.png" alt="Image">
                            <img src="/themes/raxa/assets/img/shopping/shopping-shape-3.png" alt="Image"
                                class="shopping-shape-three">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="testimonial-wrap ptb-100  bg-albastor">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2">
                        <div class="section-title style1 text-center mb-40">
                            <span>Our Testimonials</span>
                            <h2>What Our Client Says</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider-three owl-carousel">
                    <div class="testimonial-card style3">
                        <span class="quote-icon">
                            <i class="flaticon-quotation-mark"></i>
                        </span>
                        <p class="client-quote">I've been banking with this institution for several years now, and I've always been impressed with their exceptional customer service. The staff are friendly, knowledgeable, and always willing to go the extra mile to help. Their online banking service is also incredibly convenient and user-friendly. I highly recommend this bank to anyone looking for a reliable and trustworthy financial institution.</p>
                        <div class="testimonial-card-thumb">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="/themes/raxa/assets/img/testimonials/client-7.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h4>John D.</h4>
                                    <span>California, USA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card style3">
                        <span class="quote-icon">
                            <i class="flaticon-quotation-mark"></i>
                        </span>
                        <p class="client-quote">I recently opened a savings account with this bank, and I couldn't be happier with my experience. The account setup process was straightforward, and the support were incredibly helpful and patient in answering all of my questions. Their interest rates are also highly competitive, which has helped me to achieve my savings goals faster.</p>
                        <div class="testimonial-card-thumb">
                            <div class="client-info-wrap">
                                <div class="client-img">
                                    <img src="/themes/raxa/assets/img/testimonials/client-1.jpg" alt="Image">
                                </div>
                                <div class="client-info">
                                    <h4>Alex J.</h4>
                                    <span>New York, USA</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="goal-wrap ptb-100">
            <div class="container">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="goal-img-wrap">
                            <img src="/themes/raxa/assets/img/goal/goal-shape-1.png" alt="Image"
                                class="goal-shape-three bounce">
                            <img src="/themes/raxa/assets/img/goal/goal-shape-2.png" alt="Image" class="goal-shape-one">
                            <img src="/themes/raxa/assets/img/goal/goal-shape-3.png" alt="Image" class="goal-shape-two">
                            <img src="/themes/raxa/assets/img/goal/goal-1.jpg" alt="Image">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="goal-content">
                            <div class="content-title style1">
                                <span>Goal Setting</span>
                                <h2>Manage Your Money With Online Banking Solution</h2>
                                <p>Whether you want to check your account balances, transfer funds between accounts, pay bills, or monitor your transactions, our online banking solution has got you covered.</p>
                            </div>
                            <ul class="content-feature-list style1 list-style">
                                <li><span><i class="flaticon-tick"></i></span>Manage Cards</li>
                                <li><span><i class="flaticon-tick"></i></span>Manage Accounts</li>
                                <li><span><i class="flaticon-tick"></i></span>Verify Transactions</li>
                                <li><span><i class="flaticon-tick"></i></span>Save And Invest Your Money</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <footer class="footer-wrap bg-rock">
            <div class="container">
                <img src="/themes/raxa/assets/img/footer-shape-1.png" alt="Image" class="footer-shape-one">
                <img src="/themes/raxa/assets/img/footer-shape-2.png" alt="Image" class="footer-shape-two">
                <div class="row pt-100 pb-75">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <a href="index.html" class="footer-logo">
                                <x-application-logo/>
                            </a>
                            <p class="comp-desc">
                                We are committed to providing you with the best banking experience possible, whether you're managing your money online or in person. If you have any questions or concerns, please don't hesitate to reach out to our friendly and knowledgeable customer support team. We appreciate your business and look forward to serving you in the future.
                            </p>
                            <div class="social-link">
                                <ul class="social-profile list-style style1">
                                    <li>
                                        <a target="_blank" href="#">
                                            <i class="ri-facebook-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#">
                                            <i class="ri-twitter-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#">
                                            <i class="ri-linkedin-fill"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a target="_blank" href="#">
                                            <i class="ri-pinterest-fill"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Our Company</h3>
                            <ul class="footer-menu list-style">
                                <li>
                                    <a href="{{route('page', 'about')}}">
                                        <i class="flaticon-next"></i>
                                        Company &amp; Team
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('page', 'service')}}">
                                        <i class="flaticon-next"></i>
                                        Our Services
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('page', 'contact')}}">
                                        <i class="flaticon-next"></i>
                                        Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Products</h3>
                            <ul class="footer-menu list-style">
                                <li>
                                    <a href="service-one.html">
                                        <i class="flaticon-next"></i>
                                        Online Payment
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-next"></i>
                                        Deposit
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-next"></i>
                                        Master Card
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-next"></i>
                                        Receive Money
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="flaticon-next"></i>
                                        Affiliate Program (Coming Soon)
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h3 class="footer-widget-title">Subscribe</h3>
                            <p class="newsletter-text">Subscribe to our newsletter to get latest updates</p>
                            <form action="#" class="newsletter-form">
                                <input type="email" placeholder="Your Email">
                                <button type="button">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p> <i class="ri-copyright-line"></i>
                    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
                    <script>
                        document.write(new Date().getFullYear())
                    </script> {{config('app.name')}}. All Rights Reserved.
                </p>
            </div>
        </footer>

    </div>


    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>


    <script src="/themes/raxa/assets/js/jquery.min.js"></script>
    <script src="/themes/raxa/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/themes/raxa/assets/js/form-validator.min.js"></script>
    <script src="/themes/raxa/assets/js/contact-form-script.js"></script>
    <script src="/themes/raxa/assets/js/aos.js"></script>
    <script src="/themes/raxa/assets/js/owl.carousel.min.js"></script>
    <script src="/themes/raxa/assets/js/odometer.min.js"></script>
    <script src="/themes/raxa/assets/js/fancybox.js"></script>
    <script src="/themes/raxa/assets/js/jquery.appear.js"></script>
    <script src="/themes/raxa/assets/js/tweenmax.min.js"></script>
    <script src="/themes/raxa/assets/js/main.js"></script>
</body>

</html>
