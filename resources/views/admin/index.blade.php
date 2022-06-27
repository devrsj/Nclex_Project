@extends('admin.layouts.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Home</a></li>

            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
   
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          @can('manage-page')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $pagecount }}</h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('page.index') }}" class="small-box-footer">Manage pages <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endcan
         
          @can('blog-count')
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $blogcount }}</h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('blog.index') }}" class="small-box-footer">Manage blogs <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endcan
   
          @can('user-count')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $usercount}}</h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
      <a href="{{ url('/admin/unverifyusers') }}" class="small-box-footer">All Users <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endcan

           @can('visitors-count')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $visitors }}</h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
       Total website visitors <i class="fas fa-arrow-circle-right"></i>
            </div>
          </div>
          @endcan
        
        @can('contact-count')
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $contactcount }}</h3>

                <p></p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('contact.index') }}" class="small-box-footer">Contact Form <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endcan
        
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5>Notes</h5>

             
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ url('/admin/onlineclass') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        
         <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5>Classes</h5>

              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
                <a href="{{ url('/admin/onlinenote') }}" class="small-box-footer">View <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
@can('zoom-meeting')
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h5>Meeting through zoom</h5>
           <form method="post" action="{{ url('admin/meeting',$site->id) }}">
                  @csrf
           <input type="text" class="form-control" name="meeting" value="{{ $site->meeting }}">
         
         <button type="submit" class="btn btn-primary">Zoom meeting</button> 
             </form>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>

            </div>
          </div>
          @endcan
        
        
           @can('maintenance-mode')
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                

                <center><h5>Maintenace Mode</h5></center>
              </div>
            
               
              <form method="post" action="{{ url('admin/site',$site->id) }}">                     
                       @csrf
                        @if($site->site==1)
                        <td><button type="submit" class="btn btn-success btn-sm" style="align:center">Active</button></td>
                        @else
                        <td>
                       <button type="submit" class="btn btn-primary btn-sm">DeActive</button>
                        </td>
                        @endif
                        </form>


            </div>
          </div>
          @endcan
          <!-- ./col -->
        </div>
<div class="row">

<br>





</div>
</div>
</div>
        <!-- /.row -->
        <!-- Main row -->
      <!--  -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jscharting.com/latest/jscharting.js"></script>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
 
</script>

<script>
  $('#chartDiv').JSC({
  mapping: {
    referenceLayers: 'World',
    projection: false
  },
  type: 'map',
  height: 330,
  legendVisible: false,
  chartArea: {
    fill: '#FFFFFF'
  },
  defaultPointOutlineWidth: 0,
  series: [{
    defaultPoint: {
      color: 'rgba(245,106,13,0.97)'
    },
    map: 'Continent:North America'
  }, {
    defaultPoint: {
      color: 'rgba(254,210,29,0.97)'
    },
    map: 'Continent:South America'
  }, {
    defaultPoint: {
      color: 'rgba(126,177,27,0.97)'
    },
    map: 'Continent:Europe'
  }, {
    defaultPoint: {
      color: 'rgba(61,55,108,0.97)'
    },
    map: 'Continent:Asia'
  }, {
    defaultPoint: {
      color: 'rgba(50,96,182,0.97)'
    },
    map: 'Continent:Africa'
  }, {
    defaultPoint: {
      color: 'rgba(52,130,114,0.97)'
    },
    map: 'Continent:Oceania'
  }],
  toolbarVisible: false

})
</script>
<script>
$(document).ready(function(){
$("#carousel").owlCarousel({
  autoplay: true,
  rewind: true, /* use rewind if you don't want loop */
  margin: 20,
   /*
  animateOut: 'fadeOut',
  animateIn: 'fadeIn',
  */
  responsiveClass: true,
  autoHeight: true,
  autoplayTimeout: 7000,
  smartSpeed: 800,
  nav: true,
  responsive: {
    0: {
      items: 1
    },

    600: {
      items: 5
    },

    1024: {
      items: 4
    },

    1366: {
      items: 5
    }
  }
});
});
</script>

  @endsection
