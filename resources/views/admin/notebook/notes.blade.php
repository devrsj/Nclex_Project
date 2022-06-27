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
          <form class="form-inline" method="get" action="{{ route('class.search' )  }}">
  
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Search</label>
    <input type="text" name="search" class="form-control" id="inputPassword2" placeholder="search">
    <input type="hidden" value="{{ $id }}" name="id">
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
               @if(isset($notes))
               @foreach($notes as $note)
               <div class="col-sm-3" style="margin-left:10px;margin-top:8px">
               <div class="card" style="width:17rem;">

               <video controls width="350" height="250">
<source src="{{ url('/') }}/public/storage/posts/{{  $note->file  }}"
        type="video/webm">
</video>
          
  <div class="card-body">
  <button type="button" class="btn btn-default" style="width:100%">{{ $note->title }}</button>  
 
</div>
</div>
</div>
          @endforeach
          @endif

          @if(isset($searchs))
          @if($searchs->count() > 0)
               @foreach($searchs as $key=> $search)
               <div class="col-sm-3" style="margin-left:10px;margin-top:8px">
               <div class="card" style="width:17rem;">

               <video controls width="350" height="250">
<source src="{{ url('/') }}/public/storage/posts/{{  $search->file  }}"
        type="video/webm">
</video>
          
  <div class="card-body">
  <button type="button" class="btn btn-default" style="width:100%">{{ $search->title }}</button>  


</div>
</div>
</div>
          @endforeach
          @else
          <div class="alert alert-warning" role="alert" style="margin-left:14px">
 Sorry! we dont found any {{ $search }} class
</div>
          @endif
          @endif
        
             </div>
            
          <div style="margin-left:10px">
          @if(isset($notes)){{ $notes->links() }}  @endif
             @if(isset($searchs)) {{ $searchs->links() }} @endif
        </div>
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
  