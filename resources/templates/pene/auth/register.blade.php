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

                                    <h3>Open up your Account now</h3>
                                    <p>Have an account with us? <a href="{{route('login')}}">Log in</a></p>

                                    @include(theme_path('includes.alert'))

                                    <form method="POST" action="{{route('register')}}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" placeholder="Your full name" class="form-control @error('name') is-invalid @enderror">
                                            @error('name') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="email" name="email" id="email" placeholder="Your email address" class="form-control @error('email') is-invalid @enderror">
                                            @error('email') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <input list="country" name="country" placeholder="Your Country" class="form-control @error('country') is-invalid @enderror">
                                            @error('country') <span class="invalid-feedback">{{$message}}</span>@enderror
                                            <datalist id="country">
                                                @foreach (getCountries() as $country)
                                                    <option value="{{$country}}">
                                                @endforeach
                                            </datalist>
                                        </div>

                                        <div class="form-group">
                                            <input type="text" name="state" id="state" placeholder="Your State/Province" class="form-control @error('state') is-invalid @enderror">
                                            @error('state') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="pin" id="pin" placeholder="Create a pin" class="form-control @error('pin') is-invalid @enderror">
                                            @error('pin') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password" id="password" placeholder="Your password" class="form-control @error('password') is-invalid @enderror">
                                            @error('password') <span class="invalid-feedback">{{$message}}</span>@enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" id="password" placeholder="Enter password again" class="form-control">
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
