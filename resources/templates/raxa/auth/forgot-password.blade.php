@extends(theme_path('layout.app'))


@section('content')
<div class="content-wrapper">

    <div class="breadcrumb-wrap bg-spring">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-1.png" alt="Image" class="br-shape-one xs-none">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-2.png" alt="Image" class="br-shape-two xs-none">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-3.png" alt="Image"
            class="br-shape-three moveHorizontal sm-none">
        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-4.png" alt="Image" class="br-shape-four moveVertical sm-none">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-8 col-sm-8">
                    <div class="breadcrumb-title">
                        <h2>Reset Password</h2>
                        <ul class="breadcrumb-menu list-style">
                            <li><a href="index.html">Home </a></li>
                            <li>Reset Password</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 col-md-4 col-sm-4 xs-none">
                    <div class="breadcrumb-img">
                        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-5.png" alt="Image"
                            class="br-shape-five animationFramesTwo">
                        <img src="{{theme_asset('assets/')}}/img/breadcrumb/br-shape-6.png" alt="Image" class="br-shape-six bounce">
                        <img src="{{theme_asset('assets/')}}/img/breadcrumb/breadcrumb-3.png" alt="Image">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section class="Login-wrap ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 offset-xl-3 col-lg-8 offset-lg-2 col-md-10 offset-md-1">
                    <div class="login-form-wrap">
                        <div class="login-header">
                            <h3>Reset Password</h3>
                            <p>Enter your email to reset password</p>
                        </div>
                        <div class="login-form">
                            <div class="login-body">
                                <form class="form-wrap" action="{{route('password.request')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if (session('status'))
                                                <div class="alert alert-success">{{session('status')}}</div>
                                            @endif
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
                                                    <button class="btn style1">
                                                        Reset Password
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 text-center">
                                                <p class="mb-0"><a class="link style1" href="{{route('login')}}">Go Back</a></p>
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
