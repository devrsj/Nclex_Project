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
            @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Store</h3>
              </div>

      
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" action="{{ route('vendor.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                <div class="form-group">
                 <label>store name:</label>
                 <input type="text" class="form-control" name="store_name" value="{{ old('store_name') }}"> 
             </div>


                <div class="form-group">
                 <label>user name:</label>
                 <input type="text" class="form-control" name="name" value="{{ old('name') }}"> 
             </div>

             <div class="form-group">
                 <label>Email:</label>
                 <input type="text" class="form-control" name="email" value="{{ old('email') }}">
             </div>

             <div class="form-group">
                 <label>Phone Number:</label>
                 <input type="text" class="form-control" name="number" value="{{ old('number') }}">
             </div>

             <div class="form-group">
                 <label>Password:</label>
                 <input type="text" class="form-control" name="password" value="{{ old('password') }}">
             </div>

             <div class="form-group">
                 <label> Confirm Password:</label>
                 <input type="password" class="form-control" name="confirm-password" value="{{ old('confirm-password') }}" >
             </div>

                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control select2bs4" name="country_id" style="width: 100%;" id="">
           
           @foreach(Db::table('countries')->get() as $country)
           @php
                  
                  $co=Db::table('allcountry')->where('iso3',$country->iso3)->first();
                  @endphp
                    <option value="{{ $country->id }}">{{ $co->nicename }}</option>
             @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label>State</label>
                  <select class="form-control select2bs4" name="state_id" style="width: 100%;" id="">
           
           @foreach(Db::table('states')->get() as $state)
                    <option value="{{ $state->id }}">{{ $state->state }}</option>
             @endforeach
                    </select>
                </div>

                
                <div class="form-group">
                  <label>City</label>
                  <select class="form-control select2bs4" name="city_id" style="width: 100%;" id="">
           
           @foreach(Db::table('cities')->get() as $city)
                    <option value="{{ $city->id }}">{{ $city->city }}</option>
             @endforeach
                    </select>
                </div>


                  
                    
                <div class="form-group">
                  <label>Area</label>
                  <select class="form-control select2bs4" name="area_id" style="width: 100%;" id="">
           
           @foreach(Db::table('areas')->get() as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
             @endforeach
                    </select>
                </div>

                <div class="form-group">
                 <label>location:</label>
                 <input type="text" class="form-control" name="location">
             </div>

                <div class="form-group">
                 <label>photo of shop:</label>
                 <input type="file" class="form-control" name="shop_image">
             </div>

             <div class="form-group">
                 <label>document of shop:</label>
                 <input type="file" class="form-control" name="document_file">
             </div>

             <div class="form-group">
                 <label>Bank Name:</label>
                 <input type="text" class="form-control" name="bank_name" value="{{ old('bank_name') }}">
             </div>

             <div class="form-group">
                 <label>Account Name:</label>
                 <input type="text" class="form-control" name="acc_name" value="{{ old('acc_name') }}">
             </div>
             <div class="form-group">
                 <label>Account Number:</label>
                 <input type="text" class="form-control" name="acc_nbr" value="{{ old('acc_nbr') }}">
             </div>

                
             <div class="form-group" id="description">
  <label>Description</label>
<textarea id="summernote" name="description">
  {{ old('description') }}      
</textarea>
</div>
<div class="form-group">
                  <label>Verify</label>
                  <select class="form-control select2bs4" name="verify" style="width: 100%;" id="">
           
                    <option value="1" @if (old('verify') == '1') selected="selected" @endif >Yes</option>
                    <option value="0" @if (old('verify') == '0') selected="selected" @endif>No</option>
                    </select>
                </div>


<input type="hidden" name="is_admin" value="v">
      
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">save</button>
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
  