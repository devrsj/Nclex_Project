@extends('front.layouts.master')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{ asset('front_assets/assets/img/others/breadcrumbs-bg.png') }}">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumbs_text">
                        <h1>Login</h1>
                        <ul>
                            <li><a href="{{ url('/') }}">Home </a></li>
                            <li> // Login | Register</li>
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
            <div class="col-lg-3 pt-3 pt-lg-0">
</div>
                <div class="col-lg-7 pt-7 pt-lg-0">
                <form action="{{ route('register') }}" method="post">
                             @csrf
                        <div class="login-form">
                            <h4 class="login-title">Register</h4>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <label>User Name</label>
                                    <input type="text" placeholder="User Name" name="name"  value="{{ old('name') }}" required autofocus >
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <input type="hidden" value="0" name="is_admin">
                            <input type="hidden" value="1" name="status">

                                <div class="col-md-12">
                                    <label>Email Address*</label>
                                    <input type="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input type="text" placeholder="Password" name="password" required>

                                    @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                                </div>
                                <div class="col-md-6">
                                    <label>Confirm Password</label>
                                    <input type="password" placeholder="Confirm Password"  name="password_confirmation" required>
                                </div>
                                
                                <div class="col-12">
                                    <button class="btn custom-btn md-size" type="submit">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection