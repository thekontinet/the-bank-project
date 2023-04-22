<!doctype html>
<html lang="zxx" class="theme-light">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{config('app.name')}} @yield('title')</title>
        <meta name="description" content="Welcome to {{config('app.name')}}. Your trusted financial platform">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{config('app.url')}}">

        <meta property="og:title" content="{{config('app.name')}} @yield('title')">
        <meta property="og:description" content="Welcome to {{config('app.name')}}. Your trusted financial platform">
        <meta property="og:image" content="/image/logo.png">
        <meta property="og:url" content="{{config('app.url')}}">
        <meta property="og:type" content="website">

        <!-- Links of CSS files -->
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/animate.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/fontawesome.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/flaticon.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/magnific-popup.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/nice-select.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/slick.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/meanmenu.css">
		<link rel="stylesheet" href="{{theme_asset('')}}assets/css/odometer.min.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/style.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/responsive.css">
        <link rel="stylesheet" href="{{theme_asset('')}}assets/css/dark-style.css">
        <script src="//unpkg.com/alpinejs" defer></script>

        <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
        <link rel="icon" type="image/png" href="/images/favicon-16x16.png">
        <link rel="manifest" href="/images/site.webmanifest">
    </head>

        <!-- Preloader -->
        <div class="preloader">
            <div class="loader">
                <div class="shadow"></div>
                <div class="box"></div>
            </div>
        </div>
        <!-- End Preloader -->
        <div class="position-absolute px-2 py-4" style="right: 0;">
            <div id="google_translate_element"></div>
        </div>
        @yield('content')

        <div class="go-top"><i class="fas fa-arrow-up"></i></div>

        <!-- Dark/Light Toggle -->
		<div class="dark-version">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div>

        <!-- Links of JS files -->
        <script src="{{theme_asset('')}}assets/js/jquery.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/bootstrap.bundle.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/meanmenu.js"></script>
        <script src="{{theme_asset('')}}assets/js/nice-select.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/slick.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/magnific-popup.min.js"></script>
		<script src="{{theme_asset('')}}assets/js/appear.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/odometer.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/owl.carousel.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/parallax.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/wow.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/form-validator.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/contact-form-script.js"></script>
        <script src="{{theme_asset('')}}assets/js/jquery.ajaxchimp.min.js"></script>
        <script src="{{theme_asset('')}}assets/js/main.js"></script>

        <script src="{{env('LIVE_CHAT_URL')}}" async></script>
        <script type="text/javascript">
            function googleTranslateElementInit() {
              new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
            }
        </script>

        <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    </body>
</html>
