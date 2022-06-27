
@php
 $seo_head =App\Models\Seo::first();
 @endphp
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="{{ url('/') }}/public/storage/posts/{{ $seo_head->favicon }}" rel="icon">
      <link href="{{ url('/') }}/public/storage/posts/{{ $seo_head->favicon }}" rel="apple-touch-icon">
<link rel="icon" type="{{ url('/') }}/storage/" href="{{ url('/') }}">
<meta name="google-site-verification" content="">
<base href="{{ url('/') }}">
<meta name="abstract" content="{{ url('/') }}">
<meta http-equiv="content-type" content="text/html" charset="utf-8" />
<link rel="alternate" href="{{ url('/') }}" hreflang="en"/>   
   @if(isset($page))
<link rel="canonical" href="{{ url ('/') }} /
    {{ $page->slug }}" />
   @endif
     @if(isset($event_detail))
<link rel="canonical" href="{{ url ('/') }} /
    {{ $event_detail->meta_title }}" />
   @endif
   
  
   @if(isset($category))
   <link rel="canonical" href="{{ url ('/') }} /
    {{ $category->slug }}" />
   @endif
   @if(isset($blog_detail))
<link rel="canonical" href="{{ url ('/') }} /
    {{ $blog_detail->slug }}" />
   @endif
   @if(isset($product_category))
<link rel="canonical" href="{{ url ('/') }} /
    {{ $product_category->slug }}" />
   @endif
   @if(isset($product))
<link rel="canonical" href="{{ url ('/') }} /
    {{ $product->slug }}" />
   @endif
   @if(isset($slug))
<link rel="canonical" href="{{ url ('/') }} /
    {{ $slug }}" />
   @endif
   @if(isset($tag))
<link rel="canonical" href="{{ url ('/') }} /
    {{ $tag_blog->slug }}" />
   @endif
   
   

<meta name="copyright" content="{{ url('/') }}" />
<meta name="author" content="{{ url('/') }}"/>
<meta name="publisher" content="{{ url('/') }}"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="robots" content="index, follow" />
<meta name="format-detection" content="telephone=no,date=no,email=no" />

@if(isset($page))
<title>{{ $page->meta_title }}</title>
  <meta name="description" content="{{ $page->meta_description }}"></meta>
<meta name="keywords" content="{{ $page->meta_keyword }}"></meta>
 @endif
 @if(isset($slug))
<title>{{ $slug }}</title>
  <meta name="description" content="{{ $slug }}"></meta>
<meta name="keywords" content="{{ $slug }}"></meta>
 @endif
 @if(isset($tag))
<title>{{ $tag_blog->name }}</title>
  <meta name="description" content="{{ $tag_blog->name }}"></meta>
<meta name="keywords" content="{{ $tag_blog->name }}"></meta>
 @endif
 @if(isset($category_blogs))
<title>{{ $category->meta_title }}</title>
  <meta name="description" content="{{ $category->meta_description }}"></meta>
<meta name="keywords" content="{{ $category->meta_keyword }}"></meta>
 @endif

 @if(isset($blog_detail))
<title>{{ $blog_detail->meta_title }}</title>
  <meta name="description" content="{{ $blog_detail->meta_description }}"></meta>
<meta name="keywords" content="{{ $blog_detail->meta_keyword }}"></meta>
 @endif

 @if(isset($search))
<title>{{ $search }}</title>
  <meta name="description" content="{{ $search }}"></meta>
<meta name="keywords" content="{{ $search }}"></meta>
 @endif
 
 @if(isset($event_detail))
<title>{{ $event_detail->meta_title }}</title>
  <meta name="description" content="{{ $event_detail->meta_description }}"></meta>
<meta name="keywords" content="{{ $event_detail->meta_keyword }}"></meta>
 @endif

 

<!-- domain-verification Meta -->
<meta name="google-site-verification" content="3ilHuepyXO4eaJ93NMu-EIJIgxHhJWG-KNeRqFtFcPQ" />
<meta name="yandex-verification" content="" />
<!-- domain-verification Meta End -->
<!--GEO-Meta-Tags -->
<meta name="geo.region" content="NP" />
<meta name="geo.position" content="27.6982783, 85.2380705" />
<!-- Facebook Meta -->
<meta name = "og_site_name" 		property = "og:site_name"	content="{{ url('/') }}" />
<meta name = "og:url" 				property = "og:url"			content="{{ url('/') }}" />
<meta name = "og:type" 				property = "og:type"		content="website" />
<meta name = "og:image:secure_url" 	property = "og:image:secure_url" content="{{ url('/') }}" />
@if(isset($page))
<meta name = "og:image:alt"         property = "og:image:alt"   content="{{ $page->meta_title }}" />
@endif


@if(isset($category))
<meta name = "og:image:alt"         property = "og:image:alt"   content="{{ $category->meta_title }}" />
@endif
@if(isset($slug))
<meta name = "og:image:alt"         property = "og:image:alt"   content="{{ $slug }}" />
@endif
@if(isset($event_detail))
<meta name = "og:image:alt"         property = "og:image:alt"   content="{{ $event_detail->meta_title }}" />
@endif


@if(isset($tag))
<meta name = "og:image:alt"         property = "og:image:alt"   content="{{ $tag_blog->name }}" />
@endif
@if(isset($blog_detail))
<meta name = "og:image:alt"         property = "og:image:alt"   content="{{ $blog_detail->meta_title }}" />
@endif
<meta name = "og:image:type"		property = "og:image:type" 	content="image/jpeg" />
<meta name = "og:image:hright"		property = "og:image:height" content="300" />
@if(isset($page))
<meta name = "og:title"             property = "og:title"       content="{{ $page->meta_title }}" />
<meta name = "og:description"       property = "og:description" content="{{ $page->meta_description }}" />
<!-- Facebook Meta End -->
@endif
@if(isset($slug))
<meta name = "og:title"             property = "og:title"       content="{{ $slug }}" />
<meta name = "og:description"       property = "og:description" content="{{ $slug }}" />
<!-- Facebook Meta End -->
@endif
@if(isset($tag))
<meta name = "og:title"             property = "og:title"       content="{{ $tag_blog->name }}" />
<meta name = "og:description"       property = "og:description" content="{{ $tag_blog->name }}" />
<!-- Facebook Meta End -->
@endif


@if(isset($category))
<meta name = "og:title"             property = "og:title"       content="{{ $category->meta_title }}" />
<meta name = "og:description"       property = "og:description" content="{{ $category->meta_description }}" />
<!-- Facebook Meta End -->
@endif
@if(isset($blog_detail))
<meta name = "og:title"             property = "og:title"       content="{{ $blog_detail->meta_title }}" />
<meta name = "og:description"       property = "og:description" content="{{ $blog_detail->meta_description }}" />
@endif

@if(isset($event_detail))
<meta name = "og:title"             property = "og:title"       content="{{ $event_detail->meta_title }}" />
<meta name = "og:description"       property = "og:description" content="{{ $event_detail->meta_description }}" />
@endif


<!-- Twitter Meta -->
<meta name="twitter:card"         	content="summary_large_image" />
<meta name="twitter:site"           content="{{ url('/') }}" />
<meta name="twitter:image"          content="{{ url('/') }}" />
 @if(isset($page))
<meta name="twitter:title"          content="{{ $page->meta_title }}"/>
<meta name="twitter:description"    content="{{ $page->meta_description }}" />
@endif

@if(isset($event_detail))
<meta name="twitter:title"          content="{{ $event_detail->meta_title }}"/>
<meta name="twitter:description"    content="{{ $event_detail->meta_description }}" />
@endif
@if(isset($slug))
<meta name="twitter:title"          content="{{ $slug }}"/>
<meta name="twitter:description"    content="{{ $slug }}" />
@endif


@if(isset($tag))
<meta name="twitter:title"          content="{{ $tag_blog->name }}"/>
<meta name="twitter:description"    content="{{ $tag_blog->name }}" />
@endif

@if(isset($category))
<meta name="twitter:title"          content="{{ $category->meta_title }}"/>
<meta name="twitter:description"    content="{{ $category->meta_description }}" />
@endif
@if(isset($blog_detail))
<meta name="twitter:title"          content="{{ $blog_detail->meta_title }}"/>
<meta name="twitter:description"    content="{{ $blog_detail->meta_description }}" />
@endif

<!-- Twitter Meta End -->

