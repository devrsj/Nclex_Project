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
                <h3 class="card-title">Add Office Location</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   method="post" action="{{ route('office.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">



         

                  <div class="form-group" id="name">
                    <label for="name">City:</label>
                    <input type="text" name="city" class="form-control" id="name" placeholder="City" value="{{ old('city')}} ">
                  </div>
                
                <div class="form-group" id="post">
                    <label for="client_post">City Location:</label>
                    <input type="text" name="city_location" class="form-control" id="post" placeholder="City Location" value="{{ old('city_location')}} ">
                  </div>

               
                  <div class="form-group" id="number">
                    <label for="number">Number:</label>
                    <input type="number" name="number" class="form-control"  min="0" placeholder="Number" value="{{ old('number')}}">
                  </div>

                  <div class="form-group" id="email">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control"  placeholder="Email" value="{{ old('email')}}">
                  </div>

                  <div class="form-group" id="google_map">
                    <label for="google_map">Google Map:</label>
                    <input type="text" name="google_map" class="form-control"  placeholder="Google Map" value="{{ old('google_map')}}">
                  </div>

            
                  <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" value="{{ old('weight') }}" name="weight" class="form-control" min="1">
                  </div>

                 
                  <div class="form-group">
                  <label>Publish Status</label>
                  <select class="form-control select2bs4" name="status" style="width: 100%;" id="blog_type">
           
                    <option value="1" @if (old('status') == '1') selected="selected" @endif >Active</option>
                    <option value="0" @if (old('status') == '0') selected="selected" @endif>DeActive</option>
                    </select>
                </div>
            

              
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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
  
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  @endsection
  