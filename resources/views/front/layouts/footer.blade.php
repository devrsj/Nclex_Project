<footer class="footer-area">
    <div class="footer-top bg-img default-overlay pt-80 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>{{ $about->name }}</h4>
                        </div>
                        <div class="footer-about">
                            <p> {!! $about->description !!}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>{{ $quicklink->name }}</h4>
                        </div>
                        @php
                       $quicks=Db::table('pages')->where('parent_id',$quicklink->id)->where('status',1)->orderBy('weight','asc')->get();
                        @endphp
                        <div class="footer-list">
                            <ul>
                                 @foreach($quicks as $quick)
                                <li><a @if($quick->link==null)   href="{{ route('page.slug',$quick->slug) }}"@else   href="{{ $quick->link }}" @endif>{{ $quick->name }}</a></li>
                                  @endforeach

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>Contact Info</h4>
                        </div>
                        <div class="f-contact-info">
                            <div class="single-f-contact-info">
                                <i class="fa fa-home"></i>
                                <span>{{ $header->address }}</span>
                            </div>
                            <div class="single-f-contact-info">
                            <a href="mailto: {{ $header->email }}"><i class="fa fa-envelope-o"></i>
                                <span>{{ $header->email }}</span></a>
                            </div>
                            <div class="single-f-contact-info">
                                <a href="tel:+977{{ $header->number }}"><i class="fa fa-phone"></i>
                                <span>+977 {{ $header->number }}</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-widget mb-40">
                        <div class="footer-title">
                            <h4>News Letter</h4>
                        </div>
                        <div class="subscribe-style">
                            <div class="subscribe-form">
                            <form method="post" action="{{ route('newsletter.store') }}">
                                @csrf

                                    <div class="mc-form">
                                        <input class="email" type="email" required="" placeholder="Your E-mail Address" name="email" value="" required>
                                        <div class="mc-news" aria-hidden="true">
                                            <input type="text" value="">
                                        </div>
                                        <div class="clear">
                                            <input class="button" type="submit" name="subscribe" value="SUBMIT">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pt-10 pb-10">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="copyright">
                        <p>
                            Copyright &copy;
                            NCLEX
                            . All Right Reserved.
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="footer-menu-social">
                        <div class="footer-menu">
                            <ul>
                                @foreach($bottoms as $bottom)
                                <li><a @if($bottom->link==null)   href="{{ route('page.privacy',$bottom->slug) }}"@else   href="{{ $bottom->link }}"   @endif>{{ $bottom->name }}</a></li>
                               @endforeach
                            </ul>
                        </div>
                        <div class="footer-social">
                        
                            <ul>

                                
                                <li><a class="facebook" href="{{ $setting->facebook_link }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                 <li><a class="twitter" href="{{ $setting->instagram_link }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="youtube" href="{{ $setting->youtube_link }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="twitter" href="{{ $setting->twitter_link }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



<script src="{{ asset('front_assets/assets/js/jquery-v2.2.4.min.js') }}"></script>
<script src="{{ asset('front_assets/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('front_assets/assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('front_assets/assets/js/plugins.js') }}"></script>
<script src="{{ asset('front_assets/assets/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('front_assets/assets/js/main.js') }}"></script>
<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
 @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.success("{{ session('success') }}");
  @endif
</script>

</body>

</html>