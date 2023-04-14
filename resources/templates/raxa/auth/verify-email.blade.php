@extends(theme_path('layout.app'))


@section('content')
<div class="content-wrapper">

    <section class="Login-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="login-form-wrap">
                        <div class="login-header">
                            <h3>Email Confirmation</h3>
                            <p>{{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}</p>
                        </div>
                        <div class="login-form">
                            <div class="login-body">
                                <div class="col-lg-12">
                                    @if (session('status') == 'verification-link-sent')
                                        <div class="alert alert-success">{{ __('A new verification link has been sent to the email address you provided during registration.') }}</div>
                                    @endif
                                </div>
                                <form class="form-wrap" action="{{ route('verification.send') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button class="btn style1">
                                                    Resend
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-wrap" action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <button class="btn style2">
                                                    Logout
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
