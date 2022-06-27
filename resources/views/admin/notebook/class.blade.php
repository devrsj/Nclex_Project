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
          <!-- left column -->
      
          <div class="col-md-12">
         
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Notes</h3>
              </div>
              <br>
              <br>
             <div class="row">
               @foreach($classcategories as $classcategory)
             <div class="col-sm-4">
            <!-- small box -->
            <div class="small-box bg-warning" style="margin-left:8px;margin-right:8px">
                  @if($classcategory->thumbnail !=null)
                   <img src="{{ url('/') }}/public/storage/posts/{{ $classcategory->thumbnail }}" style="width:100%;width:100%">
                   @endif
              <div class="inner">
                  
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('classcategory.index',$classcategory->id) }}" class="small-box-footer">{{ $classcategory->name }}<i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          @endforeach
        
             </div>
             
          <div style="margin-left:10px">{{ $classcategories->links() }}</div>
             <br>
             <div class="card-header">
                <h3 class="card-title">Notes</h3>
              </div>
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
  