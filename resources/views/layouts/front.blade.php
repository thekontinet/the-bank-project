<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$title}} | {{env('APP_NAME')}}</title>
    <!-- Favicons Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="/img/logo/logo-square-outline.svg" />
    <link rel="icon" type="image/png" sizes="32x32" href="/img/logo/logo-square-outline.svg">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/logo/logo-square-outline.svg">
    <link rel="manifest" href="/img/logo/logo-square-outline.svg">
    <meta name="description" content="{{env('APP_NAME')}} is an innovative and user-friendly banking app designed to meet all your financial needs. With {{env('APP_NAME')}}, you can easily manage your finances, make transactions, and monitor your accounts from anywhere, at any time. Our app offers a range of features including online and mobile banking, account management, transaction history, loan and card management, and much more. Our goal is to provide you with a hassle-free banking experience that is secure, efficient, and tailored to your unique requirements. Whether you're an individual or a business, {{env('APP_NAME')}} has the tools and services you need to achieve your financial goals." />
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="assets/vendors/animate/animate.min.css" />
    <link rel="stylesheet" href="assets/vendors/animate/custom-animate.css" />
    <link rel="stylesheet" href="assets/vendors/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/vendors/bxslider/jquery.bxslider.css" />
    <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.css" />
    <link rel="stylesheet" href="assets/vendors/jquery-ui/jquery-ui.css" />
    <link rel="stylesheet" href="assets/vendors/nice-select/nice-select.css" />
    <link rel="stylesheet" href="assets/vendors/odometer/odometer.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendors/owl-carousel/owl.theme.default.min.css" />
    <link rel="stylesheet" href="assets/vendors/swiper/swiper.min.css" />
    <link rel="stylesheet" href="assets/vendors/vegas/vegas.min.css" />
    <link rel="stylesheet" href="assets/vendors/thm-icons/style.css">
    <link rel="stylesheet" href="assets/vendors/language-switcher/polyglot-language-switcher.css">
    <!-- Module css -->
    <link rel="stylesheet" href="assets/css/module-css/01-header-section.css">
    <link rel="stylesheet" href="assets/css/module-css/02-banner-section.css">
    <link rel="stylesheet" href="assets/css/module-css/03-about-section.css">
    <link rel="stylesheet" href="assets/css/module-css/04-fact-counter-section.css">
    <link rel="stylesheet" href="assets/css/module-css/05-testimonial-section.css">
    <link rel="stylesheet" href="assets/css/module-css/06-partner-section.css">
    <link rel="stylesheet" href="assets/css/module-css/07-footer-section.css">
    <link rel="stylesheet" href="assets/css/module-css/08-blog-section.css">
    <link rel="stylesheet" href="assets/css/module-css/09-breadcrumb-section.css">
    <link rel="stylesheet" href="assets/css/module-css/10-contact.css">

    <!-- Template styles -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />

</head>


<body>
    <!-- Start preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="U" class="letters-loading">
                            U
                        </span>
                        <span data-text-preloader="B" class="letters-loading">
                            B
                        </span>
                        <span data-text-preloader="S" class="letters-loading">
                            S
                        </span>
                        <span data-text-preloader="B" class="letters-loading">
                            B
                        </span>
                        <span data-text-preloader="A" class="letters-loading">
                            A
                        </span>
                        <span data-text-preloader="N" class="letters-loading">
                            N
                        </span>
                        <span data-text-preloader="K" class="letters-loading">
                            K
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End preloader -->

    @yield('content')

    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler">
                <i class="fas fa-plus"></i>
            </span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image">
                    <x-application-logo/>
                </a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:{{env('APP_EMAIL')}}">{{env('APP_EMAIL')}}</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:123456789">{{env('APP_PHONE')}}</a>
                </li>
            </ul>
        </div>
    </div>


    <a href="#" data-target="html" class="scroll-to-target scroll-to-top">
        <i class="icon-chevron"></i>
    </a>

    {{-- <div id="google_translate_element" style="position: absolute; top:80px; right:50px; z-index:1000; width:100px"></div> --}}
    <script>
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                // includedLanguages: 'et',
                autoDisplay: true,
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE
            }, 'google_translate_element');
            var a = document.querySelector("#google_translate_element select");
            a.selectedIndex=1;
            a.dispatchEvent(new Event('change'));
        }
    </script>
    <script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>


    <script src="assets/vendors/jquery/jquery-3.6.0.min.js"></script>
    <script src="assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendors/bxslider/jquery.bxslider.min.js"></script>
    <script src="assets/vendors/circleType/jquery.circleType.js"></script>
    <script src="assets/vendors/circleType/jquery.lettering.min.js"></script>
    <script src="assets/vendors/isotope/isotope.js"></script>
    <script src="assets/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js"></script>
    <script src="assets/vendors/jquery-appear/jquery.appear.min.js"></script>
    <script src="assets/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendors/jquery-migrate/jquery-migrate.min.js"></script>
    <script src="assets/vendors/jquery-ui/jquery-ui.js"></script>
    <script src="assets/vendors/jquery-validate/jquery.validate.min.js"></script>
    <script src="assets/vendors/nice-select/jquery.nice-select.min.js"></script>
    <script src="assets/vendors/odometer/odometer.min.js"></script>
    <script src="assets/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="assets/vendors/swiper/swiper.min.js"></script>
    <script src="assets/vendors/vegas/vegas.min.js"></script>
    <script src="assets/vendors/wnumb/wNumb.min.js"></script>
    <script src="assets/vendors/wow/wow.js"></script>
    <script src="assets/vendors/extra-scripts/jquery.paroller.min.js"></script>
    <script src="assets/vendors/language-switcher/jquery.polyglot.language.switcher.js"></script>

    <!-- Template js -->
    <script src="assets/js/custom.js"></script>


</body>

</html>
