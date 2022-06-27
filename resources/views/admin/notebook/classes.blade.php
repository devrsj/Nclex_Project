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
          <form class="form-inline">
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Search</label>
    <input type="text" class="form-control" id="inputPassword2" placeholder="search">
  </div>
  <button type="submit" class="btn btn-primary mb-2">Search</button>
</form>
          <div class="col-md-12">
         
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Classes</h3>
              </div>
              <br>
              <br>
             <div class="row">
               @foreach($classes as $class)
               <div class="col-sm-5" style="margin-left:10px">
               <div class="card" style="width: 22rem;">
               <img src="https://www.computerhope.com/jargon/p/pdf.png">
  <div class="card-body">
  <button type="button" class="btn btn-default" style="width:100%">{{ $class->title }}</button>  
  <a href="{{ route('readmore.pdf',$class->id) }}" target="_blank"><button type="button" class="btn btn-default" style="width:100%">View</button></a>  

</div>
</div>
</div>
          @endforeach
        
             </div>
             
          <div style="margin-left:10px">{{ $classes->links() }}</div>
             <br>
             <div class="card-header">
                <h3 class="card-title">Classes</h3>
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
  