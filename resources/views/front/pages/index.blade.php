@extends('front.layouts.master')

@include('front.layouts.seo1')

@section('content')
@php
$setting=Db::table('settings')->first();
$nclex=Db::table('pages')->where([['position','other'],['status',1],['name','Recent NCLEX Passers']])->select('name','description')->first();
$ach=Db::table('pages')->where([['position','other'],['status',1],['name','Our Achievements']])->first();
$subachs=Db::table('pages')->where([['parent_id',$ach->id],['status',1]])->OrderBy('weight','asc')->get();
$passers=Db::table('people')->where('status',1)->OrderBy('weight','asc')->cursor();
$recent_passers=Db::table('people')->where('status',1)->OrderBy('id','desc')->cursor();
$branches=Db::table('branches')->where('status',1)->orderBy('weight','asc')->cursor();
@endphp
@php

$stay_connect=Db::table('pages')->where([['name','Stay Connected'],['status',1]])->first();
$blogs=Db::table('blogs')->where('status',1)->OrderBy('weight','asc')->paginate(9);
$requi=Db::table('pages')->where([['name','REQUIREMENT'],['status',1]])->first();
$proper=Db::table('pages')->where([['name','Proper Guidance'],['status',1]])->first();
$why=Db::table('pages')->where([['name','Why Us'],['status',1]])->first();
$subwhys=Db::table('pages')->where([['parent_id',$why->id],['status',1]])->get();
$learn=Db::table('pages')->where([['name','Learning Resources'],['status',1]])->first();
$recent_blogs=Db::table('blogs')->where('status',1)->orderBy('id','desc')->take(3)->get();
$categories=Db::table('blog_categories')->where('status',1)->orderBy('weight','asc')->get();
$tags=Db::table('tags')->orderBy('weight','asc')->get();
$galleries=Db::table('media')->where([['status',1],['gallery_type','gallery']])->orderBy('weight','asc')->take(8)->get();
@endphp

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95" style="background-image:url({{ url('/') }}/public/storage/posts/{{ $page->banner }});" loading="lazy">
        <div class="container">
            <h2>{{ $page->name }}</h2>
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> <span><i class="fa fa-angle-double-right"></i>{{ $page->name }}</span></li>
            </ul>
        </div>
    </div>
</div>

@if($page->name=="Why Us")
<div class="choose-area bg-img pt-40">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-1 text-center mb-50">
            <h2>Why <span>Us</span></h2>
            <p>{!! $why->description !!}</p>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="about-chose-us ">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-about-chose-us mb-75 about-negative-mrg">
                                <div class="about-choose-img">
                                    <img src="{{ url('/') }}/public/storage/posts/{{ $proper->banner }}" alt="">
                                </div>
                                <div class="about-choose-content text-light-blue">
                                    <h3>{{ $proper->name }}</h3>
                                    <p>{!! $proper->description !!} </p>
                                </div>
                            </div>
                        </div>
                         @foreach($subwhys as $subwhy)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-about-chose-us mb-75 about-negative-mrg">
                                <div class="about-choose-img">
                                    <img src="{{ url('/') }}/public/storage/posts/{{ $subwhy->banner }}" alt="" loading="lazy">
                                </div>
                                <div class="about-choose-content text-yellow">
                                    <h3>{{ $subwhy->name }}</h3>
                                    <p>{!! $subwhy->description !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                       

                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="about-img">
                    <img src="{{ url('/') }}/public/storage/posts/{{ $why->icon }}" alt="" loading="lazy">
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if($page->name=="About us")
<div class="about-us pt-50 pb-50 bg-light">
    <div class="container">
        <div class="section-title-3 text-center">
           
            <em>{!! $page->description !!}</em>
        </div>
    </div>
</div>



<div class="video-area bg-img pt-270 pb-270" style="background-image:url({{ url('/') }}/public/storage/posts/{{ $page->icon }});">
    <div class="video-btn-2">
        <a class="video-popup" href="https://www.youtube.com/watch?v={{ $page->video_url }}">
            <img class="animated" src="{{ asset('front_assets/assets/img/viddeo-btn.webp') }}" alt="">
        </a>
    </div>
</div>

<div class="requirements pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 pt-10 pb-10">
                <div class="section-title mb-80">
                    <h2>Learning <span>Resources</span></h2>
                </div>
                <p>
                  {!! $learn->description !!}
                  
</p>
            </div>

            <div class="col-lg-6 pt-10 pb-10">
                <div class="section-title mb-80">
                    <h2><span>REQUIREMENT</span></h2>
                </div>
                <p>{!! $requi->description !!}</p>
            </div>
        </div>
    </div>
</div>
@endif

@if($page->name=="What is NCLEX?")
<div class="event-details-area pt-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="event-left-wrap mr-40">
                    <div class="event-description mb-40">
                        <img src="{{ url('/') }}/public/storage/posts/{{ $page->icon }}" alt="">
                        <br>
                        <p>{!! $page->description !!}</p>
                        

                        
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-style">
                    <div class="sidebar-search mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Search</h4>
                        </div>
                        <form method="get" action="{{ route('search') }}">
                            <input type="text" placeholder="Search" name="search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-about mb-40">
                    
                        <div class="sidebar-social">
                            <ul>
                                <li><a class="facebook" href="{{ $setting->facebook_link }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="youtube" href="{{ $setting->youtube_link }}"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="twitter" href="{{ $setting->twitter_link }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-recent-post mb-35">
                        <div class="sidebar-title mb-40">
                            <h4>Recent Post</h4>
                        </div>
                        <div class="recent-post-wrap">
                            @foreach($recent_blogs as $recent)
                            <div class="single-recent-post">
                                <div class="recent-post-img">
                                    <a href="{{ route('blog.detail',$recent->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $recent->image }}" alt="" loading="lazy"></a>
                                </div>
                                <div class="recent-post-content">
                                    <h5><a href="{{ route('blog.detail',$recent->slug) }}">{!! Str::limit($recent->heading,50) !!}</a></h5>
                                    
                                    <p>{!! Str::limit($recent->description,50) !!}</p>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="sidebar-category mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Course Category</h4>
                        </div>
                        <div class="category-list">
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{ route('category.slug',$category->slug) }}">{{ $category->name }} <span>4</span></a></li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--<div class="sidebar-recent-course-wrap mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Recent Courses</h4>
                        </div>
                        <div class="sidebar-recent-course">
                            <div class="sin-sidebar-recent-course">
                                <div class="sidebar-recent-course-img">
                                    <a href="#"><img src="{{ asset('front_assets/assets/img/recent-post-1.webp') }}" alt=""></a>
                                </div>
                                <div class="sidebar-recent-course-content">
                                    <h4><a href="#">Course Title</a></h4>
                                    <ul>
                                        <li>Credits : 125</li>
                                        <li class="duration-color">Duration : 4yrs</li>
                                    </ul>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                            <div class="sin-sidebar-recent-course">
                                <div class="sidebar-recent-course-img">
                                    <a href="#"><img src="{{ asset('front_assets/assets/img/recent-post-2.webp') }}" alt=""></a>
                                </div>
                                <div class="sidebar-recent-course-content">
                                    <h4><a href="#">Course Title</a></h4>
                                    <ul>
                                        <li>Credits : 125</li>
                                        <li class="duration-color">Duration : 4yrs</li>
                                    </ul>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="sidebar-tag-wrap">
                        <div class="sidebar-title mb-40">
                            <h4>Tag</h4>
                        </div>
                        <div class="sidebar-tag">
                            <ul>
                                @foreach($tags as $tag)
                                <li><a href="{{ route('tags.group',$tag->slug) }}">{{ $tag->name }}</a></li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
@endif


@if($page->name=="NCLEX Passers")
<div class="gallery-section passers-section pt-60 pb-60">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-1 text-center mb-50">
            <h2><span>Newest</span> NCLEX Passers</h2>
        </div>

        <div class="row">

        @foreach($recent_passers as $recent_passer)
            <div class="col-lg-3 col-md-6 pt-2 pb-2">
                <a href="{{ url('/') }}/public/storage/posts/{{ $recent_passer->image }}" data-fancybox="gallery" class="img-box">
                    <img src="{{ url('/') }}/public/storage/posts/{{ $recent_passer->image }}" width="200" height="400" alt="">
                    <p class="name">{{ $recent_passer->name }}</p>
                </a>
            </div>
            @endforeach
           
        </div>
        
    </div>
</div>

<div class="gallery-section passers-section pt-60 pb-60">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-1 text-center mb-50">
            <h2><span>All</span> NCLEX Passers</h2>
        </div>

        <div class="row">

        @foreach($passers as $passer)
            <div class="col-lg-3 col-md-6 pt-2 pb-2">
                <a href="{{ url('/') }}/public/storage/posts/{{ $passer->image }}" data-fancybox="gallery" class="img-box">
                    <img src="{{ url('/') }}/public/storage/posts/{{ $passer->image }}" width="200" height="400" alt="">
                    <p class="name">{{ $passer->name }}</p>
                </a>
            </div>
            @endforeach
            
        </div>
        
    </div>
</div>
@endif

@if($page->name=="Blog")
<div class="event-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="blog-all-wrap mr-40">
                    <div class="row">

                        @foreach($blogs as $blog)
                        @php
                  $ca=Db::table('blog_categories')->where('id',$blog->category_id)->where('status',1)->first();
                    @endphp
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="single-blog mb-30">
                                <div class="blog-img">
                                    <a href="{{ route('blog.detail',$blog->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $blog->image }}" alt=""></a>
                                </div>
                                <div class="blog-content-wrap">
                                    <span>{{ $ca->name }} </span>
                                    <div class="blog-content">
                                        <h4><a href="{{ route('blog.detail',$blog->slug) }}">{!! Str::limit($blog->heading,50) !!}</a></h4>
                                        <p>{!! Str::limit($blog->description,90) !!}</p>
                                        <div class="blog-meta">
                                            <ul>
                                            
                                                <li><a href="{{ route('blog.detail',$blog->slug) }}"><i class="fa fa-user"></i>{{ $blog->published_by }}</a></li>
                                                <!--<li><a href="#"><i class="fa fa-comments-o"></i> 10</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-date">
                                        <a href="{{ route('blog.detail',$blog->slug) }}"><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                      
                    </div>
                    <div class="pro-pagination-style text-center mt-25">
                        <ul>
                        {{ $blogs->appends(['search' => request()->query('search')])->links() }}    
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-style">
                    <div class="sidebar-search mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Search</h4>
                        </div>
                        <form method="get" action="{{ route('search') }}">
                            <input type="text" placeholder="Search" name="search">
                            <button><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-about mb-40">
                    
                        <div class="sidebar-social">
                            <ul>
                                <li><a class="facebook" href="{{ $setting->facebook_link }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="youtube" href="{{ $setting->youtube_link }}"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="twitter" href="{{ $setting->twitter_link }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="google" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-recent-post mb-35">
                        <div class="sidebar-title mb-40">
                            <h4>Recent Post</h4>
                        </div>
                        <div class="recent-post-wrap">
                            @foreach($recent_blogs as $recent)
                            <div class="single-recent-post">
                                <div class="recent-post-img">
                                    <a href="{{ route('blog.detail',$recent->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $recent->image }}" alt="" loading="lazy"></a>
                                </div>
                                <div class="recent-post-content">
                                    <h5><a href="{{ route('blog.detail',$recent->slug) }}">{!! Str::limit($recent->heading,50) !!}</a></h5>
                                    
                                    <p>{!! Str::limit($recent->description,50) !!}</p>
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="sidebar-category mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Course Category</h4>
                        </div>
                        <div class="category-list">
                            <ul>
                                @foreach($categories as $category)
                                 @php
                               $blogcount=Db::table('blogs')->where('category_id',$category->id)->count();
                          
                                @endphp
                                <li><a href="{{ route('category.slug',$category->slug) }}">{{ $category->name }} <span>{{ $blogcount }}</span></a></li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--<div class="sidebar-recent-course-wrap mb-40">
                        <div class="sidebar-title mb-40">
                            <h4>Recent Courses</h4>
                        </div>
                        <div class="sidebar-recent-course">
                            <div class="sin-sidebar-recent-course">
                                <div class="sidebar-recent-course-img">
                                    <a href="#"><img src="{{ asset('front_assets/assets/img/recent-post-1.webp') }}" alt=""></a>
                                </div>
                                <div class="sidebar-recent-course-content">
                                    <h4><a href="#">Course Title</a></h4>
                                    <ul>
                                        <li>Credits : 125</li>
                                        <li class="duration-color">Duration : 4yrs</li>
                                    </ul>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                            <div class="sin-sidebar-recent-course">
                                <div class="sidebar-recent-course-img">
                                    <a href="#"><img src="{{ asset('front_assets/assets/img/recent-post-2.webp') }}" alt=""></a>
                                </div>
                                <div class="sidebar-recent-course-content">
                                    <h4><a href="#">Course Title</a></h4>
                                    <ul>
                                        <li>Credits : 125</li>
                                        <li class="duration-color">Duration : 4yrs</li>
                                    </ul>
                                    <p>Datat non proident qui offici.hafw adec qart.</p>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="sidebar-tag-wrap">
                        <div class="sidebar-title mb-40">
                            <h4>Tag</h4>
                        </div>
                        <div class="sidebar-tag">
                            <ul>
                                @foreach($tags as $tag)
                                <li><a href="{{ route('tags.group',$tag->slug) }}">{{ $tag->name }}</a></li>
                               @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endif

@if($page->name=="Gallery")
@php
$ga=Db::table('pages')->where('name','Our Gallery')->where('status',1)->first();
@endphp
<div class="gallery-section pt-60 pb-60">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-1 text-center mb-50">
            <h2>Our <span>Gallery</span></h2>
            <p>{!! $ga->description !!}</p>
        </div>

        <div class="row">
            @foreach($galleries as $gallery)
            <div class="col-lg-3 col-md-6 pt-2 pb-2">
                <a href="{{ url('/') }}/public/storage/posts/{{ $gallery->image }}" data-fancybox="gallery" class="img-box" loading="lazy">
                    <img src="{{ url('/') }}/public/storage/posts/{{ $gallery->image }}" width="200" height="400" alt="" loading="lazy">
                </a>
            </div>
            @endforeach
           

        </div>
        
    </div>
</div>
@endif

@php
$news=Db::table('news')->where('status',1)->OrderBy('weight','asc')->paginate(9);
@endphp
@if($page->name=="News & Events")
<div class="event-area pt-80 pb-80">
    <div class="container">
        <div class="row">
            @foreach($news as $new)
            <div class="col-lg-5 col-md-6">
                <div class="single-event mb-55 event-gray-bg">
                    <div class="event-img">
                        <a href="{{ route('event.detail',$new->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $new->image }}" alt=""></a>
                        <div class="event-date-wrap">
                            <span class="event-date">{{ \Carbon\Carbon::parse($new->date)->toFormattedDateString() }}</span>
                        
                        </div>
                    </div>
                    <div class="event-content">
                        <h3><a href="{{ route('event.detail',$new->slug) }}">{{ $new->name }}</a></h3>
                        <p>{!! Str::limit($new->description,90) !!}</p>
                        <div class="event-meta-wrap">
                            <div class="event-meta">
                                <i class="fa fa-location-arrow"></i>
                                <span>{{ $new->location }}</span>
                            </div>
                            <div class="event-meta">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{ $new->time }}</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
          
        </div>
        <div class="pro-pagination-style text-center mt-25">
            <ul>
               {{  $news->links() }}
            </ul>
        </div>
    </div>
</div>
@endif

@php
$co=Db::table('contactuses')->first();
@endphp
@if($page->name=="Contact us")
<div class="contact-area pt-80 pb-80">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="contact-map mr-70 p-4">
                <iframe src="{{ $co->google_map }}" width="100%" height="550" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="contact-form">
                    <div class="contact-title mb-45">
                        <h2>Stay <span>Connected</span></h2>
                        <p>{!! $stay_connect->description !!}</p>
                    </div>
                    <form  action="{{ url('/create') }}" method="post">
                        @csrf

                        <input name="name" placeholder="Name*" type="text" required>
                        <input name="email" placeholder="Email*" type="email" required>
                        <input name="subject" placeholder="Subject*" type="text" required>
                        <textarea name="message" placeholder="Message" required></textarea>

                        <div id="html_element" class="mb-3"></div>
                      
                        <button class="submit btn-style" type="submit">SEND MESSAGE</button>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="contact-info-area bg-img pt-100 pb-40 default-overlay" style="background-image:url({{ asset('front_assets/assets/img/breadcrumb-bg-6.webp') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12">
                <div class="single-contact-info mb-30 text-center">
                    <div class="contact-info-icon">
                        <span><i class="fa fa-map-marker"></i></span>
                    </div>
                    <p>{{ $co->address }}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="single-contact-info mb-30 text-center">
                    <div class="contact-info-icon">
                        <span><i class="fa fa-phone"></i></span>
                    </div>
                    <div class="contact-info-phn">
                        <div class="info-phn-title">
                            <span>Phone : </span>
                        </div>
                        <div class="info-phn-number">
                            <p>+977 {{$co->number }}</p>
                            <p>+977 {{ $co->telephone_number }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12">
                <div class="single-contact-info mb-30 text-center">
                    <div class="contact-info-icon">
                        <span><i class="fa fa-envelope-o"></i></span>
                    </div>
                    <a href="#">{{ $co->email }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<br>

@if($page->team_member=="on")
@if(isset($ach))
<div class="fun-fact-area bg-img pt-80 pb-50" style="background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url({{ url('/') }}/public/storage/posts/{{ $ach->icon }});">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-2 white-text text-center mb-60">
            <h2><span>Our</span> Achievements</h2>
            <p>{!! $ach->description !!} </p>
        </div>
        <div class="row">
            @foreach($subachs as $subach)
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-one count-white">
                    <div class="count-img">
                        <img src="{{ url('/') }}/public/storage/posts/{{ $subach->icon }}" alt="" loading="lazy">
                    </div>
                    <div class="count-content">
                        <h2 class="count">{!! $subach->description !!}</h2>
                        <span>{{ $subach->name }}</span>
                    </div>
                </div>
            </div>
            @endforeach
           

        </div>
    </div>
</div>
@endif
@endif

@if($page->customer_section=="on")

<div class="recent-passers pt-80 pb-65">
    <div class="container">
        <div class="section-title mb-50 ps-3">
            <h2>Recent <span>NCLEX Passers</span></h2>
            <p>{!! $nclex->description !!} </p>
        </div>
        <div class="testimonial-slider-wrap mt-45">
            <div class="testimonial-text-slider">
                      @foreach($passers as $key=> $passer) 
                <div class="testi-content-wrap">
                    <div class="testi-big-img">
                        <img alt="" src="{{ url('/') }}/public/storage/posts/{{ $passer->image }}">
                    </div>
                    <div class="row g-0">
                        <div class="ms-auto col-lg-6 col-md-12">
                            <div class="testi-content bg-img default-overlay" style="background-image:url({{ asset('front_assets/assets/img/testi.webp') }});">
                                <div class="quote-style quote-left">
                                    <i class="fa fa-quote-left"></i>
                                </div>
                                <p>{{ $passer->description }} </p>
                                <div class="testi-info">
                                    <h5>{{ $passer->name }}</h5>
                                    <span>Student Of NCLEX</span>
                                </div>
                                <div class="quote-style quote-right">
                                    <i class="fa fa-quote-right"></i>
                                </div>
                                <div class="testi-arrow">
                                    <img alt="" src="{{ asset('front_assets/assets/img/testi-icon.webp') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    @endforeach
                
            </div>
            
            <div class="testimonial-image-slider">
                @foreach($passers as $key=> $passer)
                <div class="sin-testi-image">
                    <img src="{{ url('/') }}/public/storage/posts/{{ $passer->image }}" alt="">
                </div>
          @endforeach 
            
            </div>
            
        </div>

        <div class="testimonial-text-img">
            <h1 class="text-view">Recent Passers <i class="fa fa-long-arrow-right"></i></h1>
        </div>

    </div>
</div>

@endif


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script>

var onloadCallback = function() {
  grecaptcha.render('html_element', {
    'sitekey' : '6LeT9lQeAAAAAINqge946IWdCvYvfbS5gNdgjAB2'
  });
};

$('form').on('submit', function(e) {
  if(grecaptcha.getResponse() == "") {
    e.preventDefault();
    alert("You can't proceed!");
  } else {
    alert("Thank you");
  }
});
    </script>

@endsection