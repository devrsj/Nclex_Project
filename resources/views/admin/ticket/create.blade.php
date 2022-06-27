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
          
          <div class="col-md-11">
            <!-- jquery validation -->
            <div class="card card-default">
              <div class="card-header">
Crete-Ticket
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   method="post" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
                @csrf
                


                <div class="card-body">
                 <div class="form-group">
                     <label>Problem:</label>
                  <input type="text" class="form-control" name="problem" placeholder="Topic">
                 </div>
                 
                 <div class="form-group">
                     <label>Description:</label>  
            <textarea id="summernote" name="reply">
             {{ old('reply') }}
              </textarea>
               </div>
                  <hr>
                 
                 <div class="form-group">
                     <button type="submit" class="btn btn-primary">Send</button>
                 </div>
                
                
                 
                 
                

              </form>
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
  