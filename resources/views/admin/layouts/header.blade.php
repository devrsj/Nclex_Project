<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nclex.com</title>

  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
  <!-- CodeMirror -->
 
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">

   <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/cr-1.5.3/date-1.0.2/fc-3.3.2/fh-3.1.8/kt-2.6.1/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.2/datatables.min.css"/>

  <link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/owlcarousel/owl.theme.default.min.css') }}">


<style type="text/css">

/* styel for clock */
.clock {
  background-color: #000;
  color: #fff;
  position: absolute;
  padding:5px 5px;
  font-size: 12px;
  border-radius: 3px;
  left: 50%;
  transform: translateX(-50% );
}

</style>





</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin') }}" class="nav-link">{{ __('staticword.home')  }}</a>
      </li>

            @php
            $contactcount=DB::table('contacts')->count();
                @endphp
                @can('contact-index')
                <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('contact.index') }}" class="nav-link">{{ __('staticword.contact')  }}
                    <button type="" class="btn btn-primary btn-sm">{{  $contactcount }}</button>
                    </a>
                </li>
                @endcan

            

      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{url('admin/profile')}}" class="nav-link">{{ Auth()->user()->name }}</a>
      </li>

      <li><select class="form-control changeLang">
      <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
      <option value="nep" {{ session()->get('locale') == 'nep' ? 'selected' : '' }}>Nepali</option>
      </select>
      </li>


      <li>
      <p class="clock" id="clock" style="margin-top:7px"> </p></li>
    
    
    </ul>

    <!-- SEARCH FORM -->


    
  </nav>

  <script type="text/javascript">
function showTime(){
  // to get current time/ date.
  var date = new Date();
  // to get the current hour
  var h = date.getHours();
    // to get the current minutes
  var m = date.getMinutes();
  //to get the current second
  var s = date.getSeconds();
  // AM, PM setting
  var session = "AM"; 
  
 //conditions for times behavior 
  if ( h == 0 ) {
    h = 12;
  }
  if( h >= 12 ){
     session = "PM";
     }
  
  if ( h > 12 ){
    h = h - 12;
  }
  m = ( m < 10 ) ? m = "0" + m : m;
  s = ( s < 10 ) ? s = "0" + s : s;
  
  //putting time in one variable
  var time = h + ":" + m + ":" + s + " " + session;
  //putting time in our div
  $('#clock').html(time); 
  //to change time in every seconds
  setTimeout( showTime, 1000 );
}
showTime();
</script> 

<script type="text/javascript">
var twitter_username = 'SanjivGurung19';
$.ajax({
  url: "https://cdn.syndication.twimg.com/widgets/followbutton/info.json?screen_names=SanjivGurung19",
  dataType : 'jsonp',
  crossDomain : true
}).done(function(data) {
  $("h3 strong").text(data[0]['followers_count']);
});
</script>
  <!-- /.navbar -->




