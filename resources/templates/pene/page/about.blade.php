@extends(theme_path('layouts.app'))


@section('content')
@include(theme_path('layouts.header'))
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg1 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <h2>About Us</h2>
                <p>The {{config('app.name')}} story</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start About Area -->
    <section class="about-area ptb-70">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="about-content">
                        <span>How we were founded</span>
                        <h2>About {{config('app.name')}}</h2>
                        <p>We’re a leading international banking group committed to building a sustainable business over the long-term. We operate in some of the world's most dynamic markets and have been for over 17 years. More than 90 per cent of our income and profits are derived from Uk, Asia and the Middle East.</p>
                        <p>{{config('app.name')}} Bank Plc is a full service commercial Bank operating through a network of about 139 branches and service outlets located in major centers across Europe, Asia and Sub Saharan Africa . The Bank serves its various markets through 4 business segments: Personal, Business, Commercial and Corporate & Investment banking. The Bank has over 830,000 shareholders including several British and International Institutional Investors and has enjoyed what is arguably Europe's most successful banking growth trajectory in the last ten years ranking amongst the top banks by total assets and capital in 2011. As part of its continued growth strategy, {{config('app.name')}} Bank Plc is focused on mainstreaming sustainable business practices into its operations. The Bank strives to deliver sustainable economic growth that is profitable, environmentally responsible and socially relevant</p>
                        <p>Over the past 15 years, {{config('app.name')}} Bank Plc. has evolved from an obscure European Bank into a world-class financial institution. Today, we are one of the largest banks in Europe in terms of assets, loans, deposits and branch network; a feat which has been achieved through a robust long-term approach to client solutions – providing committed and innovative advice. {{config('app.name')}} Bank Plc has built its strength and success in corporate banking and is now applying that expertise to the personal and business banking platforms. {{config('app.name')}} Bank Plc is focused on mainstreaming sustainable business practices into its operations. The Bank strives to deliver sustainable economic growth that is profitable, environmentally responsible, and socially relevant</p>
                    </div>
                    <div class="about-content">
                        <h2>Our Mission</h2>
                        <p>Setting standards for sustainable business practices that; unleash the talents of our employees, deliver superior value to our customers and provide innovative solutions for the markets and communities we serve.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{theme_asset()}}assets/img/about-img1.jpg" alt="image">

                        <a href="https://www.youtube.com/watch?v=bk7McNUjWgw" class="video-btn popup-youtube"><i class="fas fa-play"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->
@include(theme_path('layouts.footer'))
@endsection
