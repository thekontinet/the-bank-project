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
        <div class="container">
            <h2>Privacy Policy</h2>
            <p><strong>Last Updated:</strong> {{ now()->subMonth()->format('M jS Y') }}</p>

            <p>Welcome to {{ config('app.name') }}'s Privacy Policy. Your privacy is of utmost importance to us. This policy
                outlines the types of personal information we collect, how we use, store, and disclose it, and the steps we
                take to safeguard your information.</p>

            <h3>1. Introduction</h3>
            <p>{{ config('app.name') }} is a leading international banking group committed to sustainable business practices
                and long-term growth. With operations spanning across Europe, Asia, and Sub Saharan Africa, we provide a
                range of banking services through our Personal, Business, Commercial, and Corporate & Investment banking
                segments.</p>

            <h3>2. Information We Collect</h3>
            <p>We collect various types of personal information to provide and improve our services:</p>
            <ul>
                <li><strong>Personal Information:</strong> This includes your name, address, phone number, email address,
                    and other contact details.</li>
                <li><strong>Financial Information:</strong> Details related to your accounts, transactions, and financial
                    history.</li>
                <li><strong>Identification Information:</strong> Such as passport, national ID, or driver's license details.
                </li>
                <li><strong>Usage Data:</strong> Information about how you interact with our services, including website
                    visits, account activity, and preferences.</li>
            </ul>

            <h3>3. How We Use Your Information</h3>
            <p>We use your personal information for the following purposes:</p>
            <ul>
                <li><strong>Providing Services:</strong> To manage and administer your accounts, process transactions, and
                    provide customer support.</li>
                <li><strong>Improving Services:</strong> To analyze usage data and feedback to improve our products and
                    services.</li>
                <li><strong>Compliance:</strong> To comply with legal obligations and regulatory requirements.</li>
            </ul>

            <h3>4. Sharing and Disclosure</h3>
            <p>We may share your personal information with:</p>
            <ul>
                <li><strong>Affiliates:</strong> Other companies within the {{ config('app.name') }} group for operational
                    purposes.</li>
                <li><strong>Service Providers:</strong> Third-party service providers who assist us in delivering our
                    services.</li>
                <li><strong>Legal Requirements:</strong> When required by law or in response to legal processes.</li>
            </ul>

            <h3>5. Security</h3>
            <p>{{ config('app.name') }} employs advanced security measures to protect your personal information from
                unauthorized access, alteration, disclosure, or destruction.</p>

            <h3>6. Your Rights</h3>
            <p>You have the right to:</p>
            <ul>
                <li><strong>Access:</strong> Request access to the personal information we hold about you.</li>
                <li><strong>Rectification:</strong> Request correction of inaccurate or incomplete information.</li>
                <li><strong>Deletion:</strong> Request deletion of your personal information, subject to legal obligations.
                </li>
                <li><strong>Objection:</strong> Object to the processing of your personal information.</li>
            </ul>

            <h3>7. Changes to This Policy</h3>
            <p>We may update this Privacy Policy from time to time to reflect changes in our practices or applicable laws.
                We will notify you of any significant changes and seek your consent if required by law.</p>

            <p>Thank you for choosing {{ config('app.name') }}. We are committed to safeguarding your privacy and providing
                you with exceptional banking services.</p>
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
