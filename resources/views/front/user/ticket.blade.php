@extends('front.layouts.master')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{ asset('front_assets/assets/img/others/breadcrumbs-bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Create a Ticket</h1>
                        <ul>
                            <li><a href="{{ url('/') }}">Home </a></li>
                            <li>Ticket</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <div class="login-register-area">
        <div class="container">
            <div class="row">
            <div class="col-lg-3">
</div>
                <div class="col-lg-7">
                <form action="{{ route('user.ticket') }}" method="post">
                        @csrf

                        <div class="login-form">
                            <h4 class="login-title">Login</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Problem</label>
                                    <input type="text" placeholder="problem" name="problem">
                                    
                                </div>
                                <div class="col-lg-12">
                                    <label>Description</label>
                                   <textarea name="description" class="form-control">
                                   </textarea>
                                </div>
                                
                             
                                
                                
                                <div class="col-lg-12 pt-5">
                                    <button class="btn custom-btn md-size" type="submit">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
@endsection