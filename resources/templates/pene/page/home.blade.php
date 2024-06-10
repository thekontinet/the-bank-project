@extends(theme_path('layouts.app'))
@section('content')
    @include(theme_path('layouts.header'))

    <!-- Start Main Banner Area -->
    <div class="main-banner jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="main-banner-content">
                        <h1>Welcome To {{ config('app.name') }}</h1>
                        <p>Our mission is to make you succeed both in your business income management and your personal
                            finances.</p>
                        <a href="{{ route('login') }}" class="btn btn-primary">E-Banking</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Banner Area -->

    <!-- Start Featured Boxes Area -->
    <section class="featured-boxes-area">
        <div class="container">
            <div class="featured-boxes-inner">
                <div class="m-0 row">
                    <div class="p-0 col-lg-3 col-sm-6 col-md-6">
                        <div class="single-featured-box">
                            <div class="icon color-fb7756">
                                <i class="flaticon-piggy-bank"></i>
                            </div>
                            <h3>Saving Benefits</h3>
                            <p>When you save with our savings accounts you get intrest on your money monthly.</p>
                        </div>
                    </div>

                    <div class="p-0 col-lg-3 col-sm-6 col-md-6">
                        <div class="single-featured-box">
                            <div class="icon color-facd60">
                                <i class="flaticon-data-encryption"></i>
                            </div>
                            <h3>Fully Encrypted</h3>
                            <p>Our platform is properly encrypted and all transactions are interception free.</p>
                        </div>
                    </div>

                    <div class="p-0 col-lg-3 col-sm-6 col-md-6">
                        <div class="single-featured-box">
                            <div class="icon color-1ac0c6">
                                <i class="flaticon-wallet"></i>
                            </div>

                            <h3>Modern Payment Options</h3>
                            <p>Pay using modern payment options provided by our bank.</p>
                        </div>
                    </div>

                    <div class="p-0 col-lg-3 col-sm-6 col-md-6">
                        <div class="single-featured-box">
                            <div class="icon">
                                <i class="flaticon-shield"></i>
                            </div>

                            <h3>Safe and Secure</h3>
                            <p>Every account in our bank is secured to world class standards.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Boxes Area -->

    <!-- Start Services Area -->
    <section class="services-area ptb-70">
        <div class="p-0 container-fluid">
            <div class="overview-box">
                <div class="overview-content">
                    <div class="content left-content">
                        <h2>For People, Entrepreneurs and Business Men</h2>
                        <div class="bar"></div>
                        <p>our bank is equiped with the right tools to grow both your personal and business incomex.</p>

                        <ul class="services-list">
                            <li><span><i class="flaticon-check-mark"></i> Free Account</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Full data privacy compliance</span></li>
                            <li><span><i class="flaticon-check-mark"></i> 100% transparent costs</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Commitment-free</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Real-time spending overview</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Debit Mastercard included</span></li>
                        </ul>
                    </div>
                </div>

                <div class="overview-image">
                    <div class="image">
                        <img src="{{ theme_asset('') }}assets/img/section-1.jpg" alt="image">

                        <div class="circle-img">
                            <img src="{{ theme_asset('') }}assets/img/circle.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Services Area -->
    <section class="services-area ptb-70 bg-f7fafd">
        <div class="p-0 container-fluid">
            <div class="overview-box">
                <div class="overview-image">
                    <div class="image">
                        <img src="{{ theme_asset('') }}assets/img/section-3.jpg" alt="image" lazy>

                        <div class="circle-img">
                            <img src="{{ theme_asset('') }}assets/img/circle.png" alt="image">
                        </div>
                    </div>
                </div>

                <div class="overview-content">
                    <div class="content">
                        <h2>Small- to medium-sized businesses</h2>
                        <div class="bar"></div>
                        <p>Our bank is perfect for SMEs.</p>

                        <ul class="services-list">
                            <li><span><i class="flaticon-check-mark"></i> Easy transfers</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Deposit checks instantly</span></li>
                            <li><span><i class="flaticon-check-mark"></i> A powerful Security Infrastructure</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Coverage around the world</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Business without borders</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Affiliates and partnerships</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Services Area -->
    <section class="services-area ptb-70">
        <div class="p-0 container-fluid">
            <div class="overview-box">
                <div class="overview-content">
                    <div class="content left-content">
                        <h2>Large or enterprise level businesses</h2>
                        <div class="bar"></div>
                        <p>We render top class services to all our corporate customers, providing world class business
                            products at their disposal.</p>

                        <ul class="services-list">
                            <li><span><i class="flaticon-check-mark"></i> Corporate Cards</span></li>
                            <li><span><i class="flaticon-check-mark"></i> International Payments</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Automated accounting</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Request Features</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Premium Support</span></li>
                            <li><span><i class="flaticon-check-mark"></i> Direct Debit</span></li>
                        </ul>
                    </div>
                </div>

                <div class="overview-image">
                    <div class="image">
                        <img lazy src="{{ theme_asset('') }}assets/img/section-2.jpg" alt="image">

                        <div class="circle-img">
                            <img src="{{ theme_asset('') }}assets/img/circle.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Services Area -->

    <!-- Start Features Area -->
    <section class="features-area ptb-70 bg-f6f4f8">
        <div class="container">
            <div class="section-title">
                <h2>Our Features</h2>
                <div class="bar"></div>
                <p>Experience the convenience and security of our all-encompassing banking services. Our range of features is designed to meet your financial needs and provide you with the best banking experience possible.</p>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-features-box">
                        <div class="icon">
                            <i class="flaticon-settings"></i>
                        </div>

                        <h3>Incredible infrastructure</h3>
                        <p>Our platform is engineered with an incredible infrastructure to please all our customers.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-features-box">
                        <div class="icon bg-f78acb">
                            <i class="flaticon-envelope-of-white-paper"></i>
                        </div>

                        <h3>Email notifications</h3>
                        <p>Bank using your registered email address. Get alerts, account statements etc.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-features-box">
                        <div class="icon bg-cdf1d8">
                            <i class="flaticon-menu"></i>
                        </div>

                        <h3>Simple dashboard</h3>
                        <p>check out our easy to use dashboard and our powerful features embeded in it.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-features-box">
                        <div class="icon bg-c679e3">
                            <i class="flaticon-info"></i>
                        </div>

                        <h3>Information retrieval</h3>
                        <p>Easily retrive your banking information, transaction history, account statement e.t.c from our
                            platform.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-features-box">
                        <div class="icon bg-eb6b3d">
                            <i class="flaticon-cursor"></i>
                        </div>

                        <h3>Drag and drop functionality</h3>
                        <p>Apply for loans at the click of a button on our online banking and get up to 100,000.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 col-md-6">
                    <div class="single-features-box">
                        <div class="icon">
                            <i class="flaticon-alarm"></i>
                        </div>

                        <h3>Deadline reminders</h3>
                        <p>Get reminded on payment deadlines, bills deadlines and easily schedule auto payments on our
                            platform.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Features Area -->

    <!-- Start Invoicing Area -->
    <section class="invoicing-area ptb-70">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="invoicing-content">
                        <h2>SME Loans</h2>
                        <div class="bar"></div>
                        <p>We are commited to Small and medium Businesses to rise and grow hence we provide soft loans to
                            the owners of such businesses to help them grow. We also provide business consulting
                            professionals to teach the owners of such businesses on how best to run their businesses.</p>
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="invoicing-image">
                        <div class="main-image">
                            <img src="{{ theme_asset('') }}assets/img/invoicing-image/1.png"
                                class="wow animate__animated animate__zoomIn" alt="image">
                            <img src="{{ theme_asset('') }}assets/img/invoicing-image/2.png"
                                class="wow animate__animated animate__fadeInLeft" alt="image">
                            <img src="{{ theme_asset('') }}assets/img/invoicing-image/3.png"
                                class="wow animate__animated animate__fadeInLeft" alt="image">
                            <img src="{{ theme_asset('') }}assets/img/invoicing-image/4.png"
                                class="wow animate__animated animate__fadeInRight" alt="image">
                        </div>
                        <div class="main-mobile-image">
                            <img src="{{ theme_asset('') }}assets/img/invoicing-image/main-pic.png"
                                class="wow animate__animated animate__zoomIn" alt="image">
                        </div>
                        <div class="circle-image">
                            <img src="{{ theme_asset('') }}assets/img/invoicing-image/circle1.png" alt="image">
                            <img src="{{ theme_asset('') }}assets/img/invoicing-image/circle2.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Invoicing Area -->

    <!-- Start Fun Facts Area -->
    <section class="pt-0 funfacts-area ptb-70">
        <div class="container">
            <div class="section-title">
                <h2>We always try to understand customers expectation</h2>
                <div class="bar"></div>
                <p>We prioritize listening to our customers to better understand their needs and expectations. This allows us to continuously improve our services and deliver a personalized banking experience that exceeds your expectations.</p>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                    <div class="funfact">
                        <h3><span class="odometer" data-count="180">00</span>K</h3>
                        <p>Customers</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                    <div class="funfact">
                        <h3><span class="odometer" data-count="20">00</span>K</h3>
                        <p>Branch</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                    <div class="funfact">
                        <h3><span class="odometer" data-count="500">00</span>+</h3>
                        <p>Workers</p>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-3 col-6">
                    <div class="funfact">
                        <h3><span class="odometer" data-count="70">00</span>+</h3>
                        <p>Contrubutors</p>
                    </div>
                </div>
            </div>

            <div class="contact-cta-box">
                <h3>Have any question about us?</h3>
                <p>Don't hesitate to contact us</p>
                <a href="{{ route('page', 'contact') }}" class="btn btn-primary">Contact Us</a>
            </div>

            <div class="map-bg">
                <img src="{{ theme_asset('') }}assets/img/map.png" alt="map">
            </div>
        </div>
    </section>
    <!-- End Fun Facts Area -->

    <!-- Start Feedback Area -->
    <section class="feedback-area ptb-70 bg-f7fafd">
        <div class="container">
            <div class="section-title">
                <h2>What client say about Us</h2>
                <div class="bar"></div>
                <p>What customers say about us</p>
            </div>

            <div class="feedback-slides">
                <div class="client-feedback">
                    <div>
                        <div class="item">
                            <div class="single-feedback">
                                <div class="client-img">
                                    <img src="{{ theme_asset('') }}assets/img/client-image/1.jpg" alt="image">
                                </div>

                                <h3>Anthonia Nacomoto</h3>
                                <span>Officer</span>
                                <p>Their retirement plans are top notch and also banking with them make life easy. no
                                    unnecessary charges and the are always ready to help. they are among the top banks in
                                    Europe.</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="single-feedback">
                                <div class="client-img">
                                    <img src="{{ theme_asset('') }}assets/img/client-image/2.jpg" alt="image">
                                </div>

                                <h3>John Smith</h3>
                                <span>Web Developer</span>
                                <p>I was hesitant to switch banks after so many years, but I'm so glad I did. The customer
                                    service at this bank is top-notch, and they've helped me save money on fees and other
                                    expenses.</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="single-feedback">
                                <div class="client-img">
                                    <img src="{{ theme_asset('') }}assets/img/client-image/3.jpg" alt="image">
                                </div>

                                <h3>Jessica Warner</h3>
                                <span>Marketing Manager</span>
                                <p>I love the website for this bank. It's so user-friendly and makes it easy to check my
                                    balances, transfer funds, and even deposit checks remotely. It's like having a bank
                                    branch in my pocket!</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="single-feedback">
                                <div class="client-img">
                                    <img src="{{ theme_asset('') }}assets/img/client-image/4.jpg" alt="image">
                                </div>

                                <h3>Ross Taylor</h3>
                                <span>IT Consultant</span>
                                <p>I appreciate the security measures that this bank takes to protect my personal and
                                    financial information. Their online banking platform uses the latest encryption
                                    technology and two-factor authentication, so I feel confident banking with them.</p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="single-feedback">
                                <div class="client-img">
                                    <img src="{{ theme_asset('') }}assets/img/client-image/5.jpg" alt="image">
                                </div>

                                <h3>James Anderson</h3>
                                <span>Physician</span>
                                <p>This bank offers great features, like higher interest rates and no-fee accounts. They
                                    understand the unique financial needs of professionals and work hard to meet them.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="client-thumbnails">
                    <div>
                        <div class="item">
                            <div class="img-fill"><img src="{{ theme_asset('') }}assets/img/client-image/1.jpg"
                                    alt="client"></div>
                        </div>

                        <div class="item">
                            <div class="img-fill"><img src="{{ theme_asset('') }}assets/img/client-image/2.jpg"
                                    alt="client"></div>
                        </div>

                        <div class="item">
                            <div class="img-fill"><img src="{{ theme_asset('') }}assets/img/client-image/3.jpg"
                                    alt="client"></div>
                        </div>

                        <div class="item">
                            <div class="img-fill"><img src="{{ theme_asset('') }}assets/img/client-image/4.jpg"
                                    alt="client"></div>
                        </div>

                        <div class="item">
                            <div class="img-fill"><img src="{{ theme_asset('') }}assets/img/client-image/5.jpg"
                                    alt="client"></div>
                        </div>
                    </div>

                    <button class="prev-arrow slick-arrow">
                        <i class="fas fa-arrow-left"></i>
                    </button>

                    <button class="next-arrow slick-arrow">
                        <i class="fas fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feedback Area -->

    <!-- Start Ready To Talk Area -->
    <section class="ready-to-talk">
        <div class="container">
            <div class="ready-to-talk-content">
                <h3>Ready to talk?</h3>
                <p>Our team is here to answer your question about {{ config('app.name') }}</p>
                <a href="{{ route('page', 'contact') }}" class="btn btn-primary">Contact Us</a>
                <span><a href="{{ route('register') }}">Or, get started</a></span>
            </div>
        </div>
    </section>
    <!-- End Ready To Talk Area -->

    <!-- Start Account Create Area -->
    <section class="account-create-area">
        <div class="container">
            <div class="account-create-content">
                <h2>Apply for an account in minutes</h2>
                <p>Get your {{ config('app.name') }} account today!</p>
                <a href="{{ route('register') }}" class="btn btn-primary">Get Your {{ config('app.name') }} Account</a>
            </div>
        </div>
    </section>
    <!-- End Account Create Area -->
    @include(theme_path('layouts.footer'))
@endsection
