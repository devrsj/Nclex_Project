@extends('front.layouts.master')
@include('front.layouts.seo1')
@section('content')
@php
$setting=Db::table('settings')->first();
@endphp

@if(isset($blog_detail))
@php
$relateds=Db::table('blogs')->where('category_id',$blog_detail->category_id)->where('status',1)->orderBy('weight','asc')->get();
@endphp
@endif

<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img pt-100 pb-95" 
    @if(isset($blogs)) style="background-image:url({{ asset('front_assets/assets/img/breadcrumb-bg.webp') }});"
     @endif
     @if(isset($category_blogs)) style="background-image:url({{ url('/') }}/public/storage/posts/{{ $category->banner }});"
     @endif
     @if(isset($event_detail)) style="background-image:url({{ url('/') }}/public/storage/posts/{{ $event_detail->banner }});"
     @endif
     @if(isset($blog_detail)) style="background-image:url({{ url('/') }}/public/storage/posts/{{ $blog_detail->banner }});"
     @endif
    @if(isset($blogtags)) style="background-image:url({{ url('/') }}/public/storage/posts/{{ $tag_blog->banner }});"
     @endif>
        <div class="container">
            <h2> @if(isset($blogs)) {{ $search }}  @endif
                           @if(isset($category)) {{ $category->name }}  @endif
                           @if(isset($tag_blog)) {{ $tag_blog->name }} @endif
                           @if(isset($blog_detail)) {{ $blog_detail->heading }}  @endif
                           @if(isset($event_detail)) {{ $event_detail->name }}  @endif
                           </h2>
          
        </div>
    </div>
    <div class="breadcrumb-bottom">
        <div class="container">
            <ul>
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a> <span><i class="fa fa-angle-double-right"></i> 
                  @if(isset($blogs)) {{ $search }}  @endif
                           @if(isset($category)) {{ $category->name }}  @endif
                           @if(isset($tag_blog)) {{ $tag_blog->name }} @endif
                           @if(isset($blog_detail)) {{ $blog_detail->heading }}  @endif
                           @if(isset($event_detail)) {{ $event_detail->name }}  @endif
                           
            </span></li>
            </ul>
        </div>
    </div>
</div>


<div class="event-area pt-80 pb-80">
    <div class="container">
        <div class="row">

            <div class="col-xl-9 col-lg-8">
                <div class="blog-all-wrap mr-40">
                    <div class="row">
                     
                    @if(isset($blog_detail))
                    @php
                  $ca=Db::table('blog_categories')->where('id',$blog_detail->category_id)->where('status',1)->first();
                    @endphp
                    <div class="blog-details-top">
                        <img src="{{ url('/') }}/public/storage/posts/{{ $blog_detail->image }}" alt="" loading="lazy">
                     
                        <div class="blog-details-content-wrap">
                            <div class="b-details-meta-wrap">
                                <div class="b-details-meta">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($blog_detail->created_at)->toFormattedDateString() }}</li>
                                        <li><i class="fa fa-user"></i>{{ $blog_detail->published_by }}</li>
                                        <!--<li><i class="fa fa-comments-o"></i> 10</li>-->
                                   <li>    <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_email"></a>
</div></li> 
                                    </ul>
                                </div>
                                <span>{{ $ca->name }}</span>
                            </div>
                            <h3>{{ $blog_detail->heading }}</h3>
                            <p>{!! $blog_detail->description !!}</p>
                          
                           <!-- AddToAny BEGIN -->

                   </div>
                    </div>
                   
                    @if(isset($related))
                    <!--<div class="related-course pt-70">
                        <div class="related-title mb-45">
                            <h3>Related Blog</h3>
                            <p>Hempor incididunt ut labore et dolore mm, itation ullamco laboris <br>nisi ut aliquip. </p>
                        </div>
                        <div class="related-slider-active related-blog-slide pb-80">
                         @foreach($relateds as $related ) 
                         @php
                  $cat=Db::table('blog_categories')->where('id',$related->category_id)->where('status',1)->first();
                    @endphp 
                        <div class="single-blog">
                                <div class="blog-img">
                                    <a href="#"><img src="{{ url('/') }}/public/storage/posts/{{ $related->image }}" alt="" loading="lazy"></a>
                                </div>
                                <div class="blog-content-wrap">
                                    <span>{{ $cat->name }}</span>
                                    <div class="blog-content">
                                        <h4><a href="#">{!! Str::limit($related->heading,50) !!}</a></h4>
                                        <p>{!! Str::limit($related->description,90) !!}</p>
                                        <div class="blog-meta">
                                            <ul>
                                                <li><a href="#"><i class="fa fa-user"></i>{{ $related->published_by }}</a></li>
                                                <!--<li><a href="#"><i class="fa fa-comments-o"></i> 10</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-date">
                                        <a href="#"><i class="fa fa-calendar-o"></i> {{ \Carbon\Carbon::parse($related->created_at)->toFormattedDateString() }}</a>
                                    </div>
                                </div>
                            </div>
                           
                       <!-- </div>
                        @endforeach
                    </div>-->
                    @endif

                    <!--<div class="blog-comment">
                        <div class="blog-comment-btn mb-80 commrnt-toggle">
                            <a href="#">VIEW COMMENT</a>
                        </div>
                        <div class="blog-comment-content-wrap">
                            <h4>COMMENT</h4>
                            <div class="single-blog-comment">
                                <div class="blog-comment-img">
                                    <img src="img/blog-comment.webp" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h5>AYESHA HOQUE</h5>
                                    <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut laboperspiciatis und.</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                            <div class="single-blog-comment child-comment">
                                <div class="blog-comment-img">
                                    <img src="img/blog-comment-2.webp" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h5>AYESHA HOQUE</h5>
                                    <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut laboperspiciatis und.</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                            <div class="single-blog-comment">
                                <div class="blog-comment-img">
                                    <img src="img/blog-comment-3.webp" alt="">
                                </div>
                                <div class="blog-comment-content">
                                    <h5>AYESHA HOQUE</h5>
                                    <p>Lorem ipsum dolor sit amet, conse ctetur adipi sicing elit, sed do eiusm od tempor incidi dunt ut laboperspiciatis und.</p>
                                    <a href="#">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="leave-comment-area">
                        <h3>Leave A Comment</h3>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="leave-form">
                                        <input placeholder="Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="leave-form">
                                        <input placeholder="Email" type="email">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="leave-form leave-btn">
                                        <textarea placeholder="Message"></textarea>
                                        <input type="submit" value="POST YOUR COMMENT">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>-->
                    

                 <div id="disqus_thread"></div>
                    @endif

                @if(isset($event_detail))
                <div class="event-description">
                        <div class="description-date-social mb-45">
                            <div class="description-date-time">
                                <div class="description-date">
                                    <span class="event-date">{{ \Carbon\Carbon::parse($event_detail->date)->toFormattedDateString() }}</span>
                 
                                </div>
                                <div class="description-meta-wrap">
                                    <div class="description-meta">
                                        <i class="fa fa-location-arrow"></i>
                                        <span>{{ $event_detail->location }}</span>
                                    </div>
                                    
                                    <div class="description-meta">
                    <i class="fa fa-clock-o"></i>
                                    <span>{{ $event_detail->time }}</span>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="description-social-wrap">
                                <div class="description-social">
                                    <ul>
                                    <li><div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_email"></a>
</div></li> 
                                    </ul>
                                </div>
                                
                            </div>
                        </div>
                        <img src="{{ url('/') }}/public/storage/posts/{{ $event_detail->image }}" alt="">
                        <h3>{{ $event_detail->name }}</h3>
                        <p>{!! $event_detail->description !!}</p>
                        <div class="event-gallery text-center mt-40">
                            <div class="event-gallery-active nav-style-3 owl-carousel">
                            @if(is_array(json_decode($event_detail->multiple_image)))
			@foreach (json_decode($event_detail->multiple_image) as $key => $photo) 

            
                                <img src="{{ url('/') }}/public/storage/posts/{{ $photo  }}" alt="">
                             @endforeach
                             @endif
                            </div>
                            <h4>View Our Event Gallery</h4>
                        </div>
                        <div class="seat-book-wrap bg-img mt-80 " style="background-image:url({{ asset('front_assets/assets/img/seat-book.webp') }});">
                            <div class="seat-book-title text-center">
                                <h3>Book Your Seat Now</h3>
                                <p> natus error sit voluptatem accu antium dolorem laudantium, totam rem aperiam, eaque entore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                            </div>
                            <div class="seat-book-form">
                               <form  action="{{ route('bookingevent.store') }}" method="post">
                        @csrf
                                    
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6"> 
                                            <input placeholder="Name" type="text" name="name" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input placeholder="Email" type="email" name="email" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input  placeholder="Date" type="date" name="date" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <input placeholder="Time" type="time" name="time" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea placeholder="Message" name="message" required></textarea>
                                            <button class="seat-book-btn" type="submit">BOOK NOW</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        @if($event_detail->geoogle_map !=null)
                        <div class="location-area mt-40 mb-40">
                        <iframe src="{{ $event_detail->google_map }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                        @endif
                        
                    </div>
                @endif


                    @if(isset($blogs))
                    @if($blogs->count() > 0)
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
                                               <!-- <li><a href="#"><i class="fa fa-comments-o"></i> 10</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-date">
                                        <a href="{{ route('blog.detail',$blog->slug) }}"><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning" role="alert">
 Sorry! we dont found {{ $search }} blogs
</div>
                        @endif
                        @endif

                        @if(isset($category_blogs))
                    @if($category_blogs->count() > 0)
                        @foreach($category_blogs as $blog)
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
                                                <li><a href="#"><i class="fa fa-user"></i>{{ $blog->published_by }}</a></li>
                                                <!--<li><a href="#"><i class="fa fa-comments-o"></i> 10</a></li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-date">
                                        <a href="{{ route('blog.detail',$blog->slug) }}"><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning" role="alert">
 Sorry! we dont found {{ $category->name }} blogs
</div>
                        @endif
                        @endif

                        @if(isset($blogtags))
                    @if($blogtags->count() > 0)
                        @foreach($blogtags as $blog)
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
                                        <a href="{{ route('blog.detail',$blog->slug) }}"><i class="fa fa-calendar-o"></i>{{ \Carbon\Carbon::parse($blog->created_at)->toFormattedDateString() }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="alert alert-warning" role="alert">
 Sorry! we dont found {{ $tag_blog }} blogs
</div>
                        @endif
                        @endif

                    </div>
                    <div class="pro-pagination-style text-center mt-25">
                        <ul>
                           @if(isset($blogs)){{ $blogs->appends(['search' => request()->query('search')]) ->links() }}  @endif
                           @if(isset($category_blogs)){{ $category_blogs->appends(['search' => request()->query('search')]) ->links() }}  @endif
                           @if(isset($blogtags)){{ $blogtags->appends(['search' => request()->query('search')]) ->links() }}  @endif

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
<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->

<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    
    var disqus_config = function () {
    this.page.url = '{{ Request::url() }}';
    this.page.identifier =
    
    @if(isset($blog_detail))
     {{ $blog_detail->id }}; 
     @endif
     // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://https-www-kailashguru-com.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>



  
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
     
@endsection