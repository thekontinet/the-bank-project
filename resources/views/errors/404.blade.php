@extends('layouts.front')

@php
    $title = "Page Not Found"
@endphp

@section('content')
<div class="page-wrapper">

    <div class="stricky-header stricked-menu main-menu">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->
    <!--Start Error Page Area-->
    <section class="error-page-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="error-content text-center">
                        <div class="big-title wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <h2>Oh...ho...</h2>
                        </div>
                        <div class="title wow fadeInDown" data-wow-delay="100ms" data-wow-duration="1500ms">
                            <h2>Sorry, Something Went Wrong.</h2>
                        </div>
                        <div class="text">
                            <p>The page you are looking for was moved, removed, renamed<br> or never existed.</p>
                        </div>

                        <div class="btns-box wow slideInUp" data-wow-delay="200ms" data-wow-duration="1500ms">
                            <a class="btn-one" href="/dashboard">
                                <span class="txt">Back to Home<i class="icon-refresh arrow"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Error Page Area-->
</div>
@endsection
