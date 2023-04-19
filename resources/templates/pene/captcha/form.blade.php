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

                                    <h3>Please verify you're not a robot</h3>
                                    <p>Enter the correct answer in the image below</p>

                                    @include(theme_path('includes.alert'))

                                    <form method="POST" action="{{route('captcha.store')}}">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <img src="{{captcha_src()}}" alt="Captcha">
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="captcha" id="captcha" placeholder="Your Answer Here" class="form-control @error('captcha') is-invalid @enderror">
                                            @error('captcha') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Continue</button>
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
