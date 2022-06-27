@extends('front.layouts.master')
@include('front.layouts.seo1')
@section('content')
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
 
<div class="about-us pt-50 pb-50 bg-light">
    <div class="container">
        <div class="section-title-3 text-center">
            <h2>{{ $page->name }}</span></h2>
            <em>{!! $page->description !!}</em>
        </div>
    </div>
</div>

@endsection