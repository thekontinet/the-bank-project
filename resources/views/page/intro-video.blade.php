@extends('layouts.front')

@php
    $title = "Introduction"
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
                        <video src="/video/ubs-intro.mp4" controls></video>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Error Page Area-->
</div>
@endsection
