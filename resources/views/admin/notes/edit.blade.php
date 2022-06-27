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
            <!-- jquery validation -->
         
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Notes</h3>
              </div>

      
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('notes.update',$notebook->id) }}" enctype="multipart/form-data">
              @method('PUT') 
              @csrf
                <div class="card-body">


                  
                  <div class="form-group">
                    <label for="heading">name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="" value="{{ $notebook->name }}">
                  </div>
                  
                  <div class="form-group">
                  <label>notes</label>
                  <select class="form-control select2bs4" name="note_id" style="width: 100%;" id="">
               
@php
$classes=Db::table('online_classes')->get();
@endphp
             
               @foreach($classes as $class) 
                    <option value="{{ $class->id }}" @if($class->id===$notebook->note_id) selected='selected' @endif >{{ $class->name }}</option>
                 @endforeach
                    </select>
                </div>


                <div class="form-group" id="image">
                    <label for="exampleInputFile">import pdf file</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="" name="file">
                      </div>
                    </div>
                  </div>
      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
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
  