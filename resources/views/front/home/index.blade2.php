@extends('front.layouts.master')

@php
 $seo_head =App\Models\Seo::first();
 $why=Db::table('pages')->where([['name','Why Us'],['status',1]])->first();
 $i=1;
 @endphp
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Favicons -->
     <link href="{{ url('/') }}/public/storage/posts/{{ $seo_head->favicon }}" rel="icon">
      <link href="{{ url('/') }}/public/storage/posts/{{ $seo_head->favicon }}" rel="apple-touch-icon">
    <link rel="icon" type="{{ url('/') }}/public/storage/posts/" href="{{ url('/') }}">
    <meta name="google-site-verification" content="">
    <base href="{{ url('/') }}">
    <meta name="abstract" content="{{ url('/') }}">
    
    <link rel="alternate" href="{{ url('/') }}" hreflang="en"/>
    <link rel="canonical" href="{{ url('/') }}" />
    <meta name="copyright" content="{{ url('/') }}" />
    <meta name="author" content="{{ url('/') }}"/>
    <meta name="publisher" content="{{ url('/') }}"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow" />
    <meta name="format-detection" content="telephone=no,date=no,email=no" />
    <title>{{ $seo_head->meta_title }}</title>
    <meta name="description" content="{{ $seo_head->meta_description }}"></meta>
    <meta name="keywords" content="{{ $seo_head->meta_keyword }}"></meta>
    <!-- domain-verification Meta -->
    <meta name="google-site-verification" content="3ilHuepyXO4eaJ93NMu-EIJIgxHhJWG-KNeRqFtFcPQ" />
    <meta name="yandex-verification" content="" />
    <!-- domain-verification Meta End -->
    <!--GEO-Meta-Tags -->
    <meta name="geo.region" content="NP" />
    <meta name="geo.position" content="27.6982783, 85.2380705" />
    <!-- Facebook Meta -->
    <meta name = "og_site_name"     property = "og:site_name" content="{{ url('/') }}" />
    <meta name = "og:url"         property = "og:url"     content="{{ url('/') }}" />
    <meta name = "og:type"        property = "og:type"    content="website" />
    <meta name = "og:image:secure_url"  property = "og:image:secure_url" content="{{ url('/') }}" />
    <meta name = "og:image:alt"     property = "og:image:alt"   content="{{ $seo_head->meta_title }}" />
    <meta name = "og:image:type"    property = "og:image:type"  content="image/jpeg" />
    <meta name = "og:image:hright"    property = "og:image:height" content="300" />
    <meta name = "og:title"       property = "og:title"   content="{{ $seo_head->meta_title }}" />
    <meta name = "og:description"     property = "og:description" content="{{ $seo_head->meta_description }}" />
    <!-- Facebook Meta End -->
    <!-- Twitter Meta -->
    <meta name="twitter:card"           content="summary_large_image" />
    <meta name="twitter:site"           content="{{ url('/') }}" />
    <meta name="twitter:title"          content="{{ $seo_head->meta_title }}"/>
    <meta name="twitter:description"    content="{{ $seo_head->meta_description }}" />
    <meta name="twitter:image"          content="{{ url('/') }}" />
    <!-- Twitter Meta End -->
  
   @laravelPWA
@section('content')
@php
$seam=Db::table('pages')->where('name','Frequenty Asked Questions')->first();


$events=Db::table('news')->where('status',1)->OrderBy('weight','asc')->get();
$up_e=Db::table('pages')->where([['position','other'],['status',1],['name','Up Coming Event']])->first();
$our_blog=Db::table('pages')->where([['position','other'],['status',1],['name','Our Blog']])->first();
$blogs=Db::table('blogs')->where('status',1)->OrderBy('weight','asc')->get();
$ach=Db::table('pages')->where([['position','other'],['status',1],['name','Our Achievements']])->first();
$subachs=Db::table('pages')->where([['parent_id',$ach->id],['status',1]])->OrderBy('weight','asc')->get();

$our_g=Db::table('pages')->where([['position','other'],['status',1],['name','Our Gallery']])->first();
$head=Db::table('contactuses')->first();
$galleries=Db::table('media')->where([['status',1],['gallery_type','gallery']])->orderBy('weight','asc')->take(8)->get();
$question=Db::table('pages')->where([['position','other'],['status',1],['name','Have Questions?']])->first();
$about=Db::table('pages')->where([['position','header'],['status',1],['name','About us']])->select('video_url','slug','name','short_description','description','icon','banner')->first();
$nclex=Db::table('pages')->where([['position','other'],['status',1],['name','Recent NCLEX Passers']])->select('name','description')->first();
$passers=Db::table('people')->where('status',1)->OrderBy('weight','asc')->cursor();
$faqs=Db::table('pages')->where([['parent_id',$seam->id],['status',1]])->OrderBy('weight','asc')->get();


@endphp
<div class="slider-area">
    <div class="slider-active owl-carousel owl-theme">
        @if(isset($sliders))
        @foreach($sliders as $slider)
        <div class="single-slider slider-height-2 bg-img align-items-center d-flex slider-overlay2-1 default-overlay" style="background-image:url({{ url('/') }}/public/storage/posts/{{ $slider->image }});" loading="lazy">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="slider-content slider-content-2 slider-animated-2 text-center">
                            <h1 class="animated">{{ $slider->name }}</h1>
                            <p class="animated">{{ $slider->caption }}</p>
                            <div class="slider-btn">
                                <a class="animated default-btn btn-green-color" href="{{ $slider->image_link }}">{{ $slider->meta_title }}</a>
                                <a class="animated default-btn btn-white-color" href="{{ url('/Contact-us') }}">CONTACT US</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif

    </div>
</div>

<div class="choose-us section-padding-1">
    <div class="container-fluid">
        <div class="row no-gutters choose-negative-mrg">
            <div class="col-lg-3 col-md-6">
                <div class="single-choose-us mb-10 choose-bg-green">
                    <div class="choose-img">
                        <img class="animated" src="{{ asset('front_assets/assets/img/service-1.webp') }}" alt="" loading="lazy" loading="lazy">
                    </div>
                    <div class="choose-content">
                        <h3>Dashboard System</h3>
                        <p>No matter where you are you can connect with us through our personalized dashboard system 24 hours.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="single-choose-us mb-10 choose-bg-white">
                    <div class="choose-img">
                        <img class="animated" src="{{ asset('front_assets/assets/img/service-4.webp') }}" alt="" loading="lazy">
                    </div>
                    <div class="choose-content">
                        <h3>Transparency in -Process</h3>
                        <p>You will be notified of the completion of each step. There are five steps, and we will be there through out every step of the way.</p>
                    </div>
                </div>
            </div>
           
            <div class="col-lg-3 col-md-6">
                <div class="single-choose-us mb-10 choose-bg-green">
                    <div class="choose-img">
                        <img class="animated" src="{{ asset('front_assets/assets/img/service-3.webp') }}" alt="" loading="lazy">
                    </div>
                    <div class="choose-content">
                        <h3>Mock Test</h3>
                        <p>We will provide you with a real exam experience from our database.</p>
                    </div>
                </div>
            </div>
            
             <div class="col-lg-3 col-md-6">
                <div class="single-choose-us mb-10 choose-bg-white">
                    <div class="choose-img">
                        <img class="animated" src="{{ asset('front_assets/assets/img/service-4.webp') }}" alt="" loading="lazy">
                    </div>
                    <div class="choose-content">
                        <h3>After your arrival</h3>
                        <p>We have a team dedicated to answering any question and providing any guidance when you arrive in The United State. </p>
                    </div>
                </div>
            </div>
            
            
            
        </div>
    </div>
</div>

@if(isset($about))
<div class="about-us pt-80 pb-80">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-1 text-center mb-50">
        <h2>About <span>Us</span></h2>
            <p>{{ $about->short_description }}</p>
        </div>
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <div class="about-img about-img-2 default-overlay mr-70">
                    <img src="{{ url('/') }}/public/storage/posts/{{ $about->icon }}" alt="" loading="lazy">
                    <a class="video-btn video-popup" href="https://www.youtube.com/watch?v={{ $about->video_url }}">
                        <img src="{{ asset('front_assets/assets/img/video.webp') }}" alt="" loading="lazy">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="about-content-2 pr-70">
                    <h3>Why us ?</h3>
                    <p>{{ Str::limit($why->short_description,140) }}</p>
        <img src="{{ url('/') }}/public/storage/posts/{{ $why->banner }}" alt="" loading="lazy">

                    <div class="about-btn mt-20">
                        <a class="default-btn" href="{{ route('page.slug',$why->slug) }}">Why us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

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


<div class="faq-area pt-75 pb-80 bg-img-position" style="background-image:url({{ url('/') }}/public/storage/posts/{{ $seam->icon }});">
    <div class="container">
        <div class="faq-title text-center mb-40">
            <h2>Frequenty Asked Questions <br>
               </h2>
        </div>

        <div class="row">
            <div class="col-md-6 pt-4 pb-4">
                
            <div class="accordion accordion-flush" id="faqaccordion">
               @foreach($faqs as $key=> $faq) 
            <div class="accordion-item mb-20">
            
                        <h2 class="accordion-header" id="">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#fa{{ $faq->slug }}" aria-expanded="false" aria-controls="faq-collapseOne">
                                {{ $i++ }}. {{ $faq->name }}
                            </button>
                        </h2>

                        <div id="fa{{ $faq->slug }}" class="accordion-collapse collapse{{ $loop->first ? 'active' : '' }}" aria-labelledby="faq-headingOne" data-bs-parent="#faqaccordion">
                            <div class="accordion-body">
                            {!! $faq->description !!} 
                            </div>
                        </div>
                       
                    </div>
                     @endforeach


                </div>

            </div>
           
         @if(isset($question))
            <div class="col-md-6 pt-4 pb-4">
                <div class="callback">
                    <div class="d-flex align-items-center mb-20">
                        <div class="img-box me-3">
                            <img src="{{ url('/') }}/public/storage/posts/{{ $question->icon }}" alt="" loading="lazy">
                        </div>
                        <div class="text">
                            <h4>{{ $question->name }}</h4>
                            <h2>+977{{ $head->telephone_number }}</h2>
                        </div>
                    </div>
                    <div class="content px-2">
                       <p>{!! $question->description !!}</p>

                        <a class="callback-link" href="{{url('/contact-us') }}">Request a callback <i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="question-icon">
                        <img class="img-fluid" src="{{ asset('front_assets/assets/img/icon-what.png') }}" alt="" loading="lazy">
                    </div>
                </div>
            </div>
            @endif

        </div>

    </div>
</div>

@if(isset($galleries))
<div class="gallery-section pt-60 pb-60">
    <div class="container">
        <div class="section-title-3 section-shape-hm2-1 text-center mb-50">
            <h2>Our <span>Gallery</span></h2>
            <p>{!! $our_g->description !!}</p>
        </div>

        <div class="row">
             @foreach($galleries as $gallery)
            <div class="col-lg-3 col-md-6 pt-2 pb-2">
                <a href="{{ url('/') }}/public/storage/posts/{{ $gallery->image }}" data-fancybox="gallery" class="img-box">
                    <img src="{{ url('/') }}/public/storage/posts/{{ $gallery->image }}" width="200" height="400" alt="" loading="lazy">
                </a>
            </div>
            @endforeach
          

        </div>
        <div class="view-all text-center mt-20">
            <a class="default-btn" href="{{ url('/gallery') }}">VIEW ALL</a>
        </div>
    </div>
</div>
@endif

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

<div class="blog-event-area pt-80 pb-65">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title-3 mb-45 mrg-bottom-small">
                    <h2>Our <span>Blog</span></h2>
                    <p>{!! $our_blog->description !!} </p>
                </div>
                <div class="blog-active">
                    
                    @foreach($blogs as $blog)
                    @php
                  $ca=Db::table('blog_categories')->where('id',$blog->category_id)->where('status',1)->first();
                    @endphp
                    <div class="single-blog">
                        <div class="blog-img">
                            <a href="{{ route('blog.detail',$blog->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $blog->image }}" alt="" loading="lazy"></a>
                        </div>
                        <div class="blog-content-wrap">
                            <span> {{ $ca->name }} </span>
                            <div class="blog-content">
                                <h4><a href="{{ route('blog.detail',$blog->slug) }}">{!! Str::limit($blog->heading,50) !!}</a></h4>
                                <p>{!! Str::limit($blog->description,90) !!}</p>
                                <div class="blog-meta">
                                    <ul>
                                        <li><a href="{{ route('blog.detail',$blog->slug) }}"><i class="fa fa-user"></i> {{ $blog->published_by }}</a></li>
                                    
                                    </ul>
                                </div>
                            </div>
                            
                            <div class="blog-date">
                                <a href="{{ route('blog.detail',$blog->slug) }}"><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }} </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>
            <div class="col-lg-6">
                <div class="section-title-3 mb-45 ml-70">
                    <h2><span>Up Coming</span> Event</h2>
                    <p>{!! $up_e->description !!}</p>
                </div>
                <div class="event-active-2 ml-70">
                     
                @foreach($events as $event)
                    <div class="single-event single-event-2">
                        <div class="event-img">
                            <a href="{{ route('event.detail',$event->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $event->image }}" alt="" loading="lazy"></a>
                            <div class="event-date-wrap">
                              
                                <span>{{ \Carbon\Carbon::parse($event->date)->toFormattedDateString() }}</span>
                            </div>
                        </div>
                        <div class="event-content">
                            <h3><a href="{{ route('event.detail',$event->slug) }}">{{ $event->name }}</a></h3>
                            <p>{!! Str::limit($event->description,90) !!}</p>
                            <div class="event-meta-wrap">
                                <div class="event-meta">
                                    <i class="fa fa-location-arrow"></i>
                                    <span>{{ $event->location }}</span>
                                </div>
                                
                                <div class="event-meta">
                                    <i class="fa fa-clock-o"></i>
                                    <span>{{ $event->time }}</span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                    

                </div>
            </div>
        </div>
    </div>
</div>


<!-- ===== Q & A Modal ====== -->
<div class="modal fade" data-bs-backdrop="static" id="popup_Modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-0">
            <div class="modal-header border-none d-block p-0 mb-3">
                <div class="popup-image text-center"><img class="img-fluid" alt="image" src="{{ asset('front_assets/assets/img/about-small.jpg') }}"></div>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body text-center">
                <div class="modal-body-content" id="question">
                    <form action="#" method="POST">
                        
                        <div class="user-info text-left px-md-5">
                            <div class="field mb-3 d-flex align-items-center">
                                <label class="me-3">Name:</label>
                                <input required="required" id="name" type="text" name="name" class="form-control">
                            </div>
                            <div class="field mb-3 d-flex align-items-center">
                                <label class="me-3">Email:</label>
                                <input required="required" id="email" type="email" name="email" class="form-control">
                            </div>
                            <div class="field mb-3 d-flex align-items-center">
                                <label class="me-3">Number:</label>
                                <input required="required"  id="number" type="number" name="number" maxlength="10" class="form-control">
                            </div>
                        </div>

                        <div class="response err mx-5"></div>

                        <div class="btn-wrap py-4">
                            <!-- <button type="submit" class="default-btn">Submit your Answer</button> -->
                            <button type="button" class="default-btn dummy-btn" id="submit">Submit your Answer</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ===== Response Modal ====== -->
<div class="modal fade" data-bs-backdrop="static" id="success_response_Modal" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-0">
            <div class="modal-header border-none d-block p-0 mb-3">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="modal-body-content">

                    <div class="row">
                        <div class="col-md-12 py-3">
                            <div class="left-col h-100 text-center">
                                <div class="check-icon mb-4">
                                    
                                    
                                    
                                </div>
                                <h3 class="font-size-21 font-weight-bold mb-4">Congrats !!</h3>

                                <p class="fw-bold">You choose the correct answer: <br><em class="text-success" id="correct_ans"></em></p>
                            </div>
                        </div>


                    </div>

                    <div class="btn-wrap py-4">
                        <button data-bs-dismiss="modal" style="border: none;" type="button" class="default-btn">CLOSE</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  
  <script>
$(document).ready(function(){ 
$("#submit").click(function(){ 
    $name=$("#name").val();
    $email=$("#email").val();
    $number=$("#number").val();
    alert($name);    
    $.ajax({ 
 method:'GET',
 url:'{{ url("/userform") }}'+"/"+$name+"/"+$email+"/"+$number,
 success: function(data){
     console.log(data);
    $("#question").html(data);
 }
});
});
});

counter = 0;
function checkAnswer(questionId, counter) {
    alert('hy');
    alert(questionId);
    alert(counter);
    ans = $('input[name="option"]:checked').val(); 
        alert(ans);
           $.ajax({ 
       method:"GET",
       url: '{{ url("/answerform") }}' + '/' + questionId + "/" + ans + "/" + counter,
       success: function(data){
           console.log(data).
          $("#question").html(data);
       }
      });
      
  /*   alert($option1);
     $.ajax({ 
 method:'GET',
 url:'{{ url("/answerform") }}'+"/"+ questionId + "/" +number + "/" + ++counter,
 success: function(data){
     console.log(data);
    $("#question").html(data);
 }  */ 

}


</script>
  
@endsection
