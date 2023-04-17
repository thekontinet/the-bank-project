<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{theme_asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/remixicon.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/fancybox.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/dark-theme.css')}}">
    <link rel="stylesheet" href="{{theme_asset('assets/css/responsive.css')}}">
    <link rel="icon" type="image/png" href="{{theme_asset('assets/img/favicon.png')}}">
    <title>{{config('app.name')}}</title>
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
                                @if (Route::has('login'))
                                    <li class="nav-item xl-none">
                                        <a href="{{route('login')}}" class="btn style1">Login Now</a>
                                    </li>
                                @endif
                            </ul>
                            <div class="others-options  lg-none">
                                <div class="header-btn lg-none">
                                    @if (Route::has('login'))
                                        <a href="{{route('login')}}" class="btn style1">Login Now</a>
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

        @yield('content')

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


    <script src="{{theme_asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{theme_asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{theme_asset('assets/js/form-validator.min.js')}}"></script>
    <script src="{{theme_asset('assets/js/contact-form-script.js')}}"></script>
    <script src="{{theme_asset('assets/js/aos.js')}}"></script>
    <script src="{{theme_asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{theme_asset('assets/js/odometer.min.js')}}"></script>
    <script src="{{theme_asset('assets/js/fancybox.js')}}"></script>
    <script src="{{theme_asset('assets/js/jquery.appear.js')}}"></script>
    <script src="{{theme_asset('assets/js/tweenmax.min.js')}}"></script>
    <script src="{{theme_asset('assets/js/main.js')}}"></script>
</body>

</html>
