
@section('commonhome')
     <div class="modal fade" id="modal_box{{ $product->id }}" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"><i class="ion-android-close"></i></span>
             </button>
             <div class="modal_body">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-5 col-md-5 col-sm-12">
                             <div class="modal_tab">
                                 <div class="tab-content product-details-large">
                                     <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                         <div class="modal_tab_img">
                                             <a href="{{ route('product.slug',$product->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $product->banner  }}" alt=""></a>
                                         </div>
                                     </div>
                                     

                                 </div>
                                 <div class="modal_tab_button">
                                     <ul class="nav product_navactive owl-carousel" role="tablist">
                                        
                                     @if(is_array(json_decode($product->image)))
											@foreach (json_decode($product->image) as $key => $photo) 
                                     <li>
                                             <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{ url('/') }}/public/storage/posts/{{ $photo  }}" alt=""></a>
                                         </li>
                                         @endforeach
                                          @endif
                                        

                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-7 col-md-7 col-sm-12">
                             <div class="modal_right">
                                 <div class="modal_title mb-10">
                                     <h2>{{ $product->name }}</h2>
                                 </div>
                                 <div class="modal_price mb-10">
                                     <span class="new_price">Rs{{ $product->sp }}</span>
                               
                                 </div>
                                 <div class="modal_description mb-15">
                                     <p>{{ $product->short_description  }} </p>
                                 </div>
                               <div class="variants_selects">
                                     
                                     <div class="modal_add_to_cart">
                                     <form method="get" action="{{ route('addto.cart',$product->id) }}"> 
                                             <input min="1" max="100" step="1" name="quantity" value="1" type="number">
                                             <button type="submit">add to cart</button>
                                         </form>
                                     </div>
                                 </div>
                                 <div class="modal_social">
                                 <h2>Share this product</h2>
                                     <!-- AddToAny BEGIN -->
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_email"></a>
</div>
                                 </div>
                            
                                </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
           


                        @endforeach
                                

                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a class="btn btn-link" href="{{ url('/product') }}">View All</a>
        </div>
    </div>
</div>
<!-- product section end -->

@php
$whychoose=App\Models\Media::where('gallery_type','why choose us')->first();
@endphp

<!-- banner fullwidth section start -->
<div class="banner_fullwidth_section mb-80" data-bgimg="{{ url('/') }}/public/storage/posts/{{  $whychoose->image  }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_discount_text text-center">
                    
                    <h2 class="wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s">
                        {{ $whychoose->name }}</h2>
                    <p class="wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s">
                        {!! $whychoose->caption   !!}</p>
                    <a class="btn btn-link wow fadeInUp" href="{{ $whychoose->link }}" data-wow-delay="0.3s" data-wow-duration="1.3s">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- banner fullwidth section end -->
@php
$i=1;
@endphp
<!-- product section start -->
<div class="product_section mb-105 wow fadeInU" data-wow-delay="0.1s" data-wow-duration="1.1s">
    <div class="container-fluid">
        <div class="section_title text-center mb-55">
            <h2>Featured Products</h2>
        </div>
        <div class="row product_slick slick_navigation slick__activation" data-slick='{
                "slidesToShow": 5,
                "slidesToScroll": 1,
                "arrows": true,
                "dots": false,
                "autoplay": false,
                "speed": 300,
                "infinite": true ,  
                "responsive":[ 
                  {"breakpoint":992, "settings": { "slidesToShow": 3 } }, 
                  {"breakpoint":768, "settings": { "slidesToShow": 2 } }, 
                  {"breakpoint":500, "settings": { "slidesToShow": 1 } }  
                 ]                                                     
            }'>
            @php
             
            $f=1;
            @endphp
            @foreach($featured_products as $key=> $featured_product)
            <div class="col-lg-3">
                <article class="single_product">
                    <figure>
                        <div class="product_thumb">
                            <a href="{{ route('product.slug',$featured_product->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $featured_product->banner  }}" alt=""></a>
                            <div class="action_links">
                                <ul class="d-flex justify-content-center">
                                    <li class="add_to_cart"><a href="{{ route('addto.cart',$product->id) }}" title="Add to cart"> <span class="pe-7s-shopbag"></span></a></li>
                                    <li class="wishlist"><a href="{{ route('wishto.cart',$product->id) }}" title="Add to Wishlist"><span class="pe-7s-like"></span></a></li>
                                    <li class="quick_button"><a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#modal_boxx{{ $key + 1 }}">
                                            <span class="pe-7s-look"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        <figcaption class="product_content text-center">
                            <h4><a href="{{ route('product.slug',$featured_product->slug) }}">{{ $featured_product->name }}</a></h4>
                            <div class="price_box">
                                <span class="current_price">Rs.{{ $featured_product->sp }}.00</span>
                            </div>
                        </figcaption>
                    </figure>
                </article>

             
            </div>
            @endforeach
           
         

        </div>
    </div>
</div>


@foreach($featured_products as $key=> $featured_product)
     <!-- modal area start-->
     <div class="modal fade" id="modal_boxx{{ $key + 1 }}" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true"><i class="ion-android-close"></i></span>
             </button>
             <div class="modal_body">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-5 col-md-5 col-sm-12">
                             <div class="modal_tab">
                                 <div class="tab-content product-details-large">
                                     <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                                         <div class="modal_tab_img">
                                             <a href="{{ route('product.slug',$featured_product->slug) }}"><img src="{{ url('/') }}/public/storage/posts/{{ $product->banner  }}" alt=""></a>
                                         </div>
                                     </div>
                                     

                                 </div>
                                 <div class="modal_tab_button">
                                     <ul class="nav product_navactive owl-carousel" role="tablist">
                                        
                                     @if(is_array(json_decode($featured_product->image)))
											@foreach (json_decode($featured_product->image) as $key => $photo) 
                                     <li>
                                             <a class="nav-link active" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="false"><img src="{{ url('/') }}/public/storage/posts/{{ $photo  }}" alt=""></a>
                                         </li>
                                         @endforeach
                                          @endif
                                        

                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-7 col-md-7 col-sm-12">
                             <div class="modal_right">
                                 <div class="modal_title mb-10">
                                     <h2>{{ $featured_product->name }}</h2>
                                 </div>
                                 <div class="modal_price mb-10">
                                     <span class="new_price">Rs{{ $featured_product->sp }}</span>
                               
                                 </div>
                                 <div class="modal_description mb-15">
                                     <p>{{ $featured_product->short_description  }} </p>
                                 </div>
                               <div class="variants_selects">
                                     
                                     <div class="modal_add_to_cart">
                                     <form method="get" action="{{ route('addto.cart',$featured_product->id) }}"> 
                                             <input min="1" max="100" step="1" name="quantity" value="1" type="number">
                                             <button type="submit">add to cart</button>
                                         </form>
                                     </div>
                                 </div>
                                 <div class="modal_social">
                                 <h2>Share this product</h2>
                                 <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
<a class="a2a_button_facebook"></a>
<a class="a2a_button_twitter"></a>
<a class="a2a_button_email"></a>
</div>
        </div>
                                </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endforeach
 
 <!-- modal area end-->

 

 

<!-- product section end -->

<!-- banner section  start -->
<div class="banner_section mb-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single_banner wow fadeInUp" data-wow-delay="0.1s" data-wow-duration="1.1s" style="visibility: visible; animation-duration: 1.1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                    <div class="banner_thumb">
                        <a href="#"><img src="{{ url('/') }}/public/storage/posts/{{  $advertisement->banner  }}" alt=""></a>
                        <div class="banner_text">
                           
                            <h2>{{ $advertisement->h1 }}</h2>
                            <a class="btn btn-link" href="{{ $advertisement->link }}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_banner wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.2s" style="visibility: visible; animation-duration: 1.2s; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="banner_thumb">
                        <a href="#"><img src="{{ url('/') }}/public/storage/posts/{{  $advertisement->banner2  }}" alt=""></a>
                        <div class="banner_text">
                           
                            <h2>{{$advertisement->h2 }}</h2>
                            <a class="btn btn-link" href="{{ $advertisement->link2 }}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="single_banner wow fadeInUp" data-wow-delay="0.3s" data-wow-duration="1.3s" style="visibility: visible; animation-duration: 1.3s; animation-delay: 0.3s; animation-name: fadeInUp;">
                    <div class="banner_thumb">
                        <a href="#"><img src="{{ url('/') }}/public/storage/posts/{{  $advertisement->banner3  }}" alt=""></a>
                        <div class="banner_text">
                         
                            <h2>{{$advertisement->h3 }}</h2>
                            <a class="btn btn-link" href="{{ $advertisement->link3 }}">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
<!-- banner section  end -->


<section class=" mb-50">
    <div class="container-fluid">
        <div class="location-call p-5" @if(isset($contact))   style="background-image: url({{ url('/') }}/public/storage/posts/{{ $contact->icon }})"  @else
  style="background-image:url({{ asset('front_assets/assets/img/bg/slider-bg.jpg') }})"  @endif >
            <div class="row">
                <div class="col-md-2 text-center">
                    <span class="pe-7s-map icon"></span>
                </div>
                <div class="col-md-7">
                    <h4>{!! $header->description !!}</h4>
                    <p><a href="tel:"><i class="mr-2 ion-headphone"></i> +977 {{ $header->number }}</a>, &nbsp;&nbsp; <a href="mailto:"><i class="mr-2 ion-email"></i>{{ $header->email }}</a></p>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-link bg-white text-dark" href="{{ url('/contact') }}">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- brand section start -->
<div class="brand_section_area mb-50 wow fadeInU" data-wow-delay="0.1s" data-wow-duration="1.1s">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="brand_inner slick__activation" data-slick='{
                        "slidesToShow": 4,
                        "slidesToScroll": 1,
                        "arrows": false,
                        "dots": false,
                        "autoplay": false,
                        "speed": 300,
                        "infinite": true ,  
                        "responsive":[  
                          {"breakpoint":992, "settings": { "slidesToShow": 4 } },  
                          {"breakpoint":768, "settings": { "slidesToShow": 3 } }, 
                          {"breakpoint":576, "settings": { "slidesToShow": 2 } }, 
                          {"breakpoint":300, "settings": { "slidesToShow": 1 } }  
                         ]                                                     
                    }'>
                    @foreach($branches as $branch)
                    <div class="single_brand ">
                        <a class="primary"><img src="{{ url('/') }}/public/storage/posts/{{  $branch->image  }}" alt=""></a>
                        <a class="secondary"><img src="{{ url('/') }}/public/storage/posts/{{  $branch->image  }}" alt=""></a>
                    </div>
                    @endforeach
                   

                </div>
            </div>
        </div>
    </div>
</div>
<!-- brand section end -->
<script type="text/javascript">
         $(document).ready(function() {
            $('#share').share({
                networks: ['facebook','twitter','linkedin','tumblr','in1','stumbleupon','digg'],
                theme: 'square'
            });
            getVariantPrice();

        });
</script>
@endsection