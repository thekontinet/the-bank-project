<!doctype html>
<html lang="zxx" class="theme-light">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} @yield('title')</title>
    <meta name="description" content="Welcome to {{ config('app.name') }}. Your trusted financial platform">
    <meta name="robots" content="index, follow">
    <base href="{{ config('app.url') }}">
    <link rel="canonical" href="{{ config('app.url') }}">

    <meta property="og:title" content="{{ config('app.name') }} @yield('title')">
    <meta property="og:description"
        content="Welcome to {{ config('app.name') }}.  Your premier destination for comprehensive financial solutions and trusted banking services, committed to empowering your financial journey with innovation and excellence">
    <meta property="og:image" content="/image/logo.png">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:type" content="website">

    <!-- Links of CSS files -->
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/animate.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/flaticon.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/nice-select.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/slick.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/odometer.min.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/style.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/responsive.css">
    <link rel="stylesheet" href="{{ theme_asset('') }}assets/css/dark-style.css">
    <script src="//unpkg.com/alpinejs" defer></script>

    <link rel="apple-touch-icon" sizes="180x180" href="/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicon-16x16.png">
    <link rel="icon" type="image/png" href="/images/favicon-16x16.png">
    <link rel="manifest" href="/images/site.webmanifest">
</head>

<div class="position-fixed px-2 py-4" style="bottom: 0; right: 0">
    <div id="google_translate_element"></div>
</div>

<!-- Dark/Light Toggle -->
<div class="dark-version" style="bottom: 20px; top: auto; position: fixed;">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>

@yield('content')

<div class="go-top"><i class="fas fa-arrow-up"></i></div>

<!-- Links of JS files -->
<script src="{{ theme_asset('') }}assets/js/jquery.min.js"></script>
<script src="{{ theme_asset('') }}assets/js/bootstrap.bundle.min.js"></script>
<script src="{{ theme_asset('') }}assets/js/slick.min.js"></script>
<script src="{{ theme_asset('') }}assets/js/appear.min.js"></script>
<script src="{{ theme_asset('') }}assets/js/odometer.min.js"></script>
<script src="{{ theme_asset('') }}assets/js/main.js"></script>

<script src="{{ env('LIVE_CHAT_URL') }}" async></script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
</body>

</html>
