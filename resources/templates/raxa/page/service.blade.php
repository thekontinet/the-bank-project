@extends(theme_path('layout.app'))


@section('content')
    <div class="content-wrapper">
        <div class="breadcrumb-wrap bg-spring">
            <img src="{{ theme_asset('assets/') }}/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
            <img src="{{ theme_asset('assets/') }}/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
            <img src="{{ theme_asset('assets/') }}/img/breadcrumb/br-shape-3.png" alt="Image"
                class="br-shape-three moveHorizontal sm-none">
            <img src="{{ theme_asset('assets/') }}/img/breadcrumb/br-shape-4.png" alt="Image"
                class="br-shape-four moveVertical sm-none">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-8 col-sm-8">
                        <div class="breadcrumb-title">
                            <h2>Services</h2>
                            <ul class="breadcrumb-menu list-style">
                                <li><a href="About Us">Home</a></li>
                                <li>Services</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
                        <div class="breadcrumb-img">
                            <img src="{{ theme_asset('assets/') }}/img/breadcrumb/br-shape-5.png" alt="Image"
                                class="br-shape-five animationFramesTwo">
                            <img src="{{ theme_asset('assets/') }}/img/breadcrumb/br-shape-6.png" alt="Image"
                                class="br-shape-six bounce">
                            <img src="{{ theme_asset('assets/') }}/img/breadcrumb/breadcrumb-2.png" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <section class="service-wrap  ptb-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-card style1">
                            <span class="service-icon">
                                <img src="{{theme_asset('assets')}}/img/service/service-icon-1.png" alt="Image">
                            </span>
                            <h3><a href="service-details.html">Quick & Easy Transaction</a></h3>
                            <p>Our banking services prioritize speed and efficiency, allowing you to complete transactions quickly and easily. With our streamlined processes and advanced technology, you can expect fast and reliable transfers, payments, and other transactions.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-card style1">
                            <span class="service-icon">
                                <img src="{{theme_asset('assets')}}/img/service/service-icon-2.png" alt="Image">
                            </span>
                            <h3><a href="service-details.html">Unique Account</a></h3>
                            <p>we offer a range of unique account options that are tailored to meet the specific needs of our clients. Whether you're looking for a high-yield savings account, a specialized business account, or a customized personal account, we have the expertise and resources to create a unique solution that works for you. </p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-card style1">
                            <span class="service-icon">
                                <img src="{{theme_asset('assets')}}/img/service/service-icon-3.png" alt="Image">
                            </span>
                            <h3><a href="service-details.html">Simple Dashboard</a></h3>
                            <p>Our online banking dashboard is designed to provide you with a simple and user-friendly interface, allowing you to easily navigate and manage your accounts. With a clean and intuitive design, our dashboard makes it easy for you to view your account balances, monitor your transactions, and perform other banking activities with just a few clicks.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-card style1">
                            <span class="service-icon">
                                <img src="{{theme_asset('assets')}}/img/service/service-icon-4.png" alt="Image">
                            </span>
                            <h3><a href="service-details.html">Email Notification</a></h3>
                            <p>Stay up-to-date with your account activity with our email notification system. With our advanced technology, you can receive real-time notifications on your account balance, transaction history, and other important account updates via email. This helps you stay on top of your finances and monitor your account activity, ensuring that you're always aware of any important changes or developments.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-card style1">
                            <span class="service-icon">
                                <img src="{{theme_asset('assets')}}/img/service/service-icon-5.png" alt="Image">
                            </span>
                            <h3><a href="service-details.html">Security</a></h3>
                            <p>At {{config('app.name')}}, we take the security of your financial information and transactions very seriously. We utilize advanced security measures to protect your data and prevent unauthorized access, including multi-factor authentication, encryption, and 24/7 monitoring.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="service-card style1">
                            <span class="service-icon">
                                <img src="{{theme_asset('assets')}}/img/service/service-icon-6.png" alt="Image">
                            </span>
                            <h3><a href="service-details.html">Support</a></h3>
                            <p>we pride ourselves on providing exceptional customer support. Our dedicated support team is available to assist you with any questions or concerns you may have, whether you need help with online banking, account management, or any other banking-related issue.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
