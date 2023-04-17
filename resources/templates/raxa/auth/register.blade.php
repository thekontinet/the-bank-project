@extends(theme_path('layout.app'))


@section('content')
<div class="content-wrapper">
    <div class="breadcrumb-wrap bg-spring">
      <img
        src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-1.png"
        alt="Image"
        class="br-shape-one xs-none"
      />
      <img
        src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-2.png"
        alt="Image"
        class="br-shape-two xs-none"
      />
      <img
        src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-3.png"
        alt="Image"
        class="br-shape-three moveHorizontal sm-none"
      />
      <img
        src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-4.png"
        alt="Image"
        class="br-shape-four moveVertical sm-none"
      />
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-7 col-md-8 col-sm-8">
            <div class="breadcrumb-title">
              <h2>Register</h2>
              <ul class="breadcrumb-menu list-style">
                <li><a href="index.html">Home </a></li>
                <li>Register</li>
              </ul>
            </div>
          </div>
          <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
            <div class="breadcrumb-img">
              <img
                src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-5.png"
                alt="Image"
                class="br-shape-five animationFramesTwo"
              />
              <img
                src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-6.png"
                alt="Image"
                class="br-shape-six bounce"
              />
              <img
                src="{{theme_asset('assets/')}}/img/breadcrumb/breadcrumb-3.png"
                alt="Image"
              />
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="Login-wrap ptb-100">
      <div class="container">
        <div class="row">
          <div
            class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1"
          >
            <div class="login-form-wrap">
              <div class="login-header">
                <h3>Register New Account</h3>
                <p>Welcome!! Create A New Account</p>
              </div>
              <div class="login-form">
                <div class="login-body">
                  <form class="form-wrap" action="{{route('register')}}" method="post">
                    @csrf
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input
                            id="text"
                            name="name"
                            type="text"
                            placeholder="Full Name"
                            class="is-invalid"
                          />
                          @error('name')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input
                            id="email"
                            name="email"
                            type="email"
                            placeholder="Email"
                            class="is-invalid"
                          />
                          @error('email')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input
                            name="country"
                            list="country"
                            placeholder="Country"
                            class="is-invalid"
                          />
                          <datalist id="country">
                            @foreach (getCountries() as $country)
                                <option value="{{$country}}">
                            @endforeach
                          </datalist>
                          @error('country')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input
                            id="state"
                            name="state"
                            type="text"
                            placeholder="State"
                            class="is-invalid"
                          />
                          @error('state')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input
                            id="pin"
                            name="pin"
                            type="password"
                            placeholder="4 digit pin"
                            minlength="4"
                            maxlength="4"
                            class="is-invalid"
                          />
                          @error('pin')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input
                            id="pwd"
                            name="password"
                            type="password"
                            placeholder="Password"
                            class="is-invalid"
                          />
                          @error('password')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input
                            id="pwd_2"
                            name="password_confirmation"
                            placeholder="Confirm Password"
                            type="password"
                            class="is-invalid"
                          />
                          @error('password_confirmation')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                        </div>
                      </div>
                      <div class="col-sm-12 col-12 mb-20">
                        <div class="checkbox style3">
                          <input class="is-invalid" name="agree" type="checkbox" id="test_1" />
                          @error('agree')
                          <span class="invalid-feedback">{{$message}}</span>
                          @enderror
                          <label for="test_1">
                            I Agree with the
                            <a
                              class="link style1"
                              href="terms-of-service.html"
                              >Terms &amp; conditions</a
                            >
                          </label>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <button class="btn style1">Register Now</button>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <p class="mb-0">
                          Have an Account?
                          <a class="link style1" href="{{route('login')}}"
                            >Sign In</a
                          >
                        </p>
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
