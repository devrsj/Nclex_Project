@extends('front.layouts.master')
@section('content')
 <!-- breadcrumbs area start -->
 <div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95" style="background-image:url({{ asset('front_assets/assets/img/breadcrumb-bg.webp') }});">
        <div class="container">
            <h2>Error Page</h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> <span><i class="fa fa-angle-double-right"></i>Error Page</span></li>
            </ul>
        </div>
    </div>
</div>
<br>
<br>
<br>

    <!-- breadcrumbs area end -->
    <!-- Begin Error 404 Area -->
    <div class="error-404-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-404-content">
                        <h1 class="title mb-4">404</h1>
                        <h2 class="sub-title mb-4">Page Cannot Be Found!</h2>
                        <p class="short-desc mb-7">Seems like nothing was found at this location. Try something else or
                            you
                            can go back to the homepage following the button below!</p>
                        <div class="button-wrap">
                            <a class="btn btn-danger btn-lg rounded-0" href="{{ url('/') }}">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <!-- Error 404 Area End Here -->


@endsection