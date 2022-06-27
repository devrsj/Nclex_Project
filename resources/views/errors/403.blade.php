<!DOCTYPE html>
<html lang="en">
<head>
@php    
$seo=App\Models\Seo::first();
$setting=App\Models\Setting::first();

@endphp
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="{{ $seo->meta_description }}" content="Your description">
    <meta name="author" content="Your name">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="{{ $seo->meta_keyword }}" /> <!-- website name -->
	<meta property="og:site" content="{{ url('/') }}" /> <!-- website link -->
	<meta property="og:title" content="{{ $seo->meta_keyword }}"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="{{ $seo->meta_description }}" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="{{ url('/') }}" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>{{ $seo->meta_title }}</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('maintenace/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('maintenace/css/fontawesome-all.css') }}" rel="stylesheet">
	<link href="{{ asset('maintenace/css/styles.css') }}" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="{{ asset('maintenace/images/favicon.png') }}">
</head>
<body>
    
    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        <div class="countdown">
                            <span id="clock"></span>
                        </div> <!-- end of countdown -->

                        <h1>UnAuthorized Access</h1>
                        <p class="p-large">Sorry! You are not allowed To  Access</p>
                        
                        <a class="logo-text" href="{{ url()->previous() }}">Back</a> 

                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->

        <!-- Social Links -->
       <!--   <div class="social-container">            
          Text Logo - Use this if you don't have a graphic logo 
        </div> --><!-- end of social-container -->
        <!-- end of social links -->
        
    </header> <!-- end of header -->
    <!-- end of header -->

    <script>
 @if(Session::has('success'))
  toastr.options =
  {
    "closeButton" : true,
    "progressBar" : true
  }
        toastr.info("{{ session('success') }}");
  @endif
</script>

    <!-- Scripts -->
    <script src="{{ asset('maintenace/js/jquery.min.js') }}"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="{{ asset('maintenace/js/bootstrap.min.js') }}"></script> <!-- Bootstrap framework -->
    <script src="{{ asset('maintenace/js/jquery.easing.min.js') }}"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="{{ asset('maintenace/js/jquery.countdown.min.js') }}"></script> <!-- The Final Countdown plugin for jQuery -->
    <script src="{{ asset('maintenace/js/scripts.js') }}"></script> <!-- Custom scripts -->
</body>
</html>