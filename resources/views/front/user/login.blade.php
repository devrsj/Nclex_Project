@extends('front.layouts.master')
@section('content')

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95" style="background-image:url({{ asset('front_assets/assets/img/breadcrumb-bg.webp') }});">
        <div class="container">
            <h2>Login / Register</h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> <span><i class="fa fa-angle-double-right"></i> Login / Register</span></li>
            </ul>
        </div>
    </div>
</div>

<div class="login-register-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ms-auto me-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-bs-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                        <a data-bs-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                <form action="{{ route('login') }}" method="post">
                                     @csrf
                                     
                                        <input type="text" name="email" placeholder="email" required>
                                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                         @endif
                                       

                                        <input type="password" name="password" placeholder="Password" required>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button class="default-btn" type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="lg2" class="tab-pane">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                <form action="{{ route('register') }}" method="post">
                                         @csrf
                                         
                                        <input name="name" placeholder="Name" type="text" name="name"  value="{{ old('name') }}" required autofocus >
                                        @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                                <input type="hidden" value="s" name="is_admin">
                            <input type="hidden" value="0" name="status">

                                        <input name="email" placeholder="Email" type="email" value="{{ old('email') }}" required>
                                        @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                        <input type="password" name="password" placeholder="Password" required>
                                        @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                <input type="password" placeholder="Confirm Password"  name="password_confirmation" required>
                                        <div class="button-box">
                                            <button class="default-btn" type="submit"><span>Register</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection