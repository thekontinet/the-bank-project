@extends(theme_path('layouts.app'))


@section('content')
        <!-- Start Signup Area -->
        <section class="signup-area">
            <div class="row m-0">
                <div class="col-lg-6 col-md-12 p-0">
                    <div class="signup-image">
                        <img src="{{theme_asset()}}assets/img/signup-bg.jpg" alt="image">
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 p-0">
                    <div class="signup-content">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="signup-form">
                                    <div class="logo black-logo">
                                        <x-application-logo-dark/>
                                    </div>
                                    <div class="logo white-logo">
                                        <x-application-logo/>
                                    </div>

                                    <h3>Password Reset</h3>
                                    <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

                                    @include(theme_path('includes.alert'))

                                    <form  method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Your email address" class="form-control @error('email') is-invalid @enderror">
                                            @error('email') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Continue</button>

                                        <div class="mt-4">
                                            <a class="btn-link" href="{{route('login')}}">Go Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Login Area -->

        <!-- Dark/Light Toggle -->
		<div class="dark-version">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider">
                <span class="slider round"></span>
            </label>
        </div>
 @endsection
