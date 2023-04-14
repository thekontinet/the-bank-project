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
                        <h2>About Us</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="About Us">Home</a></li>
                            <li>About</li>
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


    <section class="about-wrap style1 ptb-100">
        <div class="container">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6 mx-auto">
                    <div class="about-img-wrap">
                        <img src="{{theme_asset('assets')}}/img/about/about-shape-1.png" alt="Image"
                            class="about-shape-one bounce">
                        <img src="{{theme_asset('assets')}}/img/about/about-shape-2.png" alt="Image"
                            class="about-shape-two moveHorizontal">
                        <img src="{{theme_asset('assets')}}/img/about/about-img-1.png" alt="Image" class="about-img">
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="about-content">
                        <img src="{{theme_asset('assets')}}/img/about/about-shape-3.png" alt="Image" class="about-shape-three">
                        <div class="content-title style1">
                            <span>Smart Banking</span>
                            <h2>The Better Way To Save &amp; Invest Online Banking</h2>
                            <p>At {{config('app.name')}}, we are dedicated to providing our clients with the highest level of financial services and customer care. Our mission is to help individuals, families, and businesses achieve their financial goals by providing them with innovative, reliable, and personalized banking solutions.

                                We have been serving the financial needs of our clients for years, and in that time, we have developed a reputation for excellence in the industry. Our experienced team of banking professionals is committed to delivering exceptional customer service and providing our clients with the guidance they need to make informed financial decisions.

                                We offer a wide range of banking products and services, including personal and business checking and savings accounts, loans, credit cards, and online banking solutions. Our competitive rates and fees, along with our commitment to service, make us an ideal choice for anyone looking for a reliable and trustworthy financial institution.

                                At {{config('app.name')}}, we understand that each of our clients has unique financial needs and goals, which is why we take a personalized approach to banking. We work closely with each of our clients to understand their specific needs and provide tailored solutions that meet their individual requirements.

                                We are also committed to giving back to the communities we serve, and we support a range of charitable organizations and community initiatives that make a positive difference in the world.

                                Thank you for considering {{config('app.name')}} for your banking needs. We look forward to the opportunity to serve you and help you achieve your financial goals.</p>
                        </div>
                        <a href="{{route('register')}}" class="btn style1">Join Us Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
