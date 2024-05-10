<!-- Preloader -->
<div class="preloader">
    <div class="loader">
        <div class="shadow"></div>
        <div class="box"></div>
    </div>
</div>
<!-- End Preloader -->

<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="luvion-responsive-nav">
        <div class="container">
            <div class="luvion-responsive-menu">
                <div class="logo">
                    <x-application-logo />
                </div>
            </div>
        </div>
    </div>

    <div class="luvion-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="/">
                    <x-application-logo />
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/" class="nav-link active">Home</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('page', 'about') }}" class="nav-link">About Us</a></li>
                        <li class="nav-item"><a href="{{ route('page', 'contact') }}" class="nav-link">Contact Us</a>
                        </li>
                    </ul>

                    <div class="others-options">
                        <a href="{{ route('login') }}" class="login-btn"><i class="flaticon-user"></i> E-Banking</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
