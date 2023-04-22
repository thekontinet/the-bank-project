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

                                    <h3>Create A New Password</h3>
                                    <p>Please enter a secured password for your account</p>

                                    @include(theme_path('includes.alert'))

                                    <form method="POST" action="{{ route('password.store') }}">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="form-group">
                                            <input type="email" name="email" id="email" value="{{old('email', $request->email)}}" placeholder="Your email address" class="form-control @error('email') is-invalid @enderror">
                                            @error('email') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="Your password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Your password Again" class="form-control @error('password_confirmation') is-invalid @enderror">
                                            @error('password_confirmation') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
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
