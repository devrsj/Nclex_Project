@extends('admin.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        
        
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4"></div>
          <!-- left column -->
          <div class="col-md-4">
        
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Online meeting</h3>
              </div>

      
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">

@php

$meeting=App\Models\Construction::first();
@endphp
                <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="data:image/jpeg;base64,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" alt="Card image cap">
  <div class="card-body">
  
    <a href="{{ $meeting->meeting }}" class="btn btn-primary">Online meeting</a>
  </div>
</div>


      
                </div>
                <!-- /.card-body -->
               
            
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
      
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
  
  

  @endsection
  