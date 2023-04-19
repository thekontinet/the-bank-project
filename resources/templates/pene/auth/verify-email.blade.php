@extends(theme_path('layouts.app'))


@section('content')
        <!-- Start Error Area -->
		<section class="error-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="error-content">
                            @include(theme_path('includes.alert'))
                            <h3>Verify Your Email</h3>
                            <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                            <form class="form-wrap d-inline-block" action="{{ route('verification.send') }}" method="post">
                                @csrf
                                <button class="btn btn-primary">Resend</button>
                            </form>
                            <form class="form-wrap d-inline-block" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-secondary">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
		<!-- End Error Area -->
@endsection
