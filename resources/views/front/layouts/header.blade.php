<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="mainfest" href="/mainfest.json">
    <link rel="stylesheet" href="{{ asset('front_assets/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/assets/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/assets/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/assets/css/style.css') }}">
    <script src="{{ asset('front_assets/assets/js/modernizr-3.11.7.min.js') }}"></script>
    @php
 $seo_head =Db::table('seos')->first();
    @endphp
    <link rel="shortcut icon" href="{{ url('/') }}/public/storage/posts/{{  $seo_head->favicon  }}" type="image/x-icon">
    <script src="{{ asset('front_assets/assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    @laravelPWA
    
</head>

<body>
    <header class="header-area">
        <div class="header-top bg-img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-12 col-sm-8">
                        <div class="header-contact">
                            <ul>
                                <li><i class="fa fa-phone"></i> +977 @if(isset($header)){{ $header->number }} @endif</li>
                                <li><i class="fa fa-envelope-o"></i><a href="#">@if(isset($header)){{ $header->email }} @endif</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-5 col-12 col-sm-4">
                        <div class="header-location">
                            <ul>
                                @if(isset($header))
                                <li><i class="fa fa-map-marker"></i>{{ $header->address }}</li>
                                    @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom sticky-bar clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-6 col-4">
                        <div class="logo">
                            <a href="{{ $setting->navbar_link }}">
                                @if(isset($header))
                                <img alt="logo" src="{{ url('/') }}/public/storage/posts/{{  $setting->navbar_logo  }}">
                                @endif
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-6 col-8">
                        <div class="menu-wrap">
                            @auth
                            <a class="header_btn d-lg-none" href="{{ url('/admin') }}"> {{ Auth()->user()->name }} </a>
                           
                                   <a class="header_btn d-lg-none"  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                            @else
                            <a class="header_btn d-lg-none" href="{{ url('/user/login') }}"> Login / Register </a>
                            @endauth
                       
                            <div class="main-menu">
                                <nav>
                                    <ul>
                                        @if(isset($pagelists))
                                        @foreach($pagelists as $pagelist)
                                        <li><a @if($pagelist->link==null)   href="{{ route('page.slug',$pagelist->slug) }}"@else   href="{{ $pagelist->link }}"   @endif> {{ $pagelist->name }} </a></li>
                                           @endforeach
                                           @endif
                                              @auth
                   
                        <li><a class="header_btn" href="{{ url('/admin') }}"> {{ Auth()->user()->name }} </a></li>   
                           <a class="header_btn"  href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                                              @else
                                    
                                              <li><a class="header_btn" href="{{ url('/user/login') }}"> Login / Register </a></li>
                                              @endauth
                                        
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-area">
                    <div class="mobile-menu">
                        <nav id="mobile-menu-active">
                            <ul class="menu-overflow">
                            @if(isset($pagelists))
                            @foreach($pagelists as $pagelist)
                            <li><a @if($pagelist->link==null)   href="{{ route('page.slug',$pagelist->slug) }}"@else   href="{{ $pagelist->link }}"   @endif> {{ $pagelist->name }} </a></li>
                               @endforeach
                               @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>