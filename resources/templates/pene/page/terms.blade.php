@extends(theme_path('layouts.app'))


@section('content')
    @include(theme_path('layouts.header'))
    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg2 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-title-content">
                <h2>Privacy & Policy</h2>
                <p>.</p>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Contact Area -->
    <section class="contact-area ptb-70">
        <div class="container mt-5">
            <h2>Terms of Service</h2>
            <p><strong>Last Updated:</strong> April 18, 2024</p>

            <p>Thank you for choosing {{ config('app.name') }}. These Terms of Service govern your use of our banking
                services and website. By accessing or using {{ config('app.name') }}, you signify your agreement to comply
                with and be bound by these terms. If you do not agree with these terms, please refrain from using our
                services.</p>

            <h3>1. Acceptance of Terms</h3>
            <p>Your access to and use of {{ config('app.name') }} is conditioned on your acceptance of and compliance with
                these Terms. By accessing or using our services, you agree to be bound by these Terms of Service. If you
                disagree with any part of the terms, please do not use our services.</p>

            <h3>2. Use of Services</h3>
            <p>Your use of {{ config('app.name') }} is solely for lawful purposes and in accordance with these Terms and
                applicable laws and regulations. You are responsible for maintaining the confidentiality of your account
                information and for all activities that occur under your account.</p>

            <h3>3. Registration and Account Security</h3>
            <p>To access certain features of {{ config('app.name') }}, you may need to register for an account. You must
                provide accurate and complete information and update it as necessary. You are responsible for maintaining
                the confidentiality of your account credentials and for all activities that occur under your account.</p>

            <h3>4. Fees and Payments</h3>
            <p>Some {{ config('app.name') }} services may require payment of fees. By using these services, you agree to pay
                all applicable fees and charges. Fees are subject to change, and {{ config('app.name') }} will provide
                notice of any changes.</p>

            <h3>5. Intellectual Property</h3>
            <p>All content, logos, and trademarks on {{ config('app.name') }} are the exclusive property of
                {{ config('app.name') }} Bank Plc or its licensors and are protected by copyright, trademark, and other
                intellectual property laws.</p>

            <h3>6. Limitation of Liability</h3>
            <p>{{ config('app.name') }} shall not be liable for any indirect, incidental, special, or consequential damages
                arising out of or in connection with your use of our services, whether based on warranty, contract, tort, or
                any other legal theory.</p>

            <h3>7. Changes to Terms</h3>
            <p>We reserve the right to update or modify these Terms of Service at any time without prior notice. Any changes
                will be posted on this page with a revised "Last Updated" date. Your continued use of
                {{ config('app.name') }} after the updated terms become effective constitutes your acceptance of the
                revised terms.</p>

            <h3>8. Termination</h3>
            <p>{{ config('app.name') }} reserves the right to terminate or suspend your access to our services without
                prior notice for any reason, including violation of these terms.</p>

            <h3>9. Governing Law</h3>
            <p>These Terms of Service shall be governed by and construed in accordance with the laws of [Your Jurisdiction],
                without regard to its conflict of law principles.</p>

            <p>We appreciate your trust in {{ config('app.name') }}. Our commitment is to provide you with exceptional
                banking services while ensuring compliance with these terms and applicable laws.</p>
        </div>
    </section>
    <!-- End Contact Area -->

    <!-- Start Account Create Area -->
    <section class="account-create-area">
        <div class="container">
            <div class="account-create-content">
                <h2>Apply for an account in minutes</h2>
                <p>Get your Luvion account today!</p>
                <a href="{{ route('register') }}" class="btn btn-primary">Get Your {{ config('app.name') }} Account</a>
            </div>
        </div>
    </section>
    <!-- End Account Create Area -->
    @include(theme_path('layouts.footer'))
@endsection
