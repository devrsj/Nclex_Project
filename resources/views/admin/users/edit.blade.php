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
                   @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
           
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit new users</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   method="post" action="{{ route('users.update',$user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">


                  <div class="form-group">
                    <label for="name">Name:</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Enter the role name" value="{{ $user->name }} "> 
                  </div>
                
                   <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter the email" value="{{ $user->email }}">
                  </div>
                
                  <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Enter the password" value="{{ $user->password }}">
                  </div>
                
                 <div class="form-group">
                    <label for="name">Confirm password:</label>
                    <input type="password" name="confirm-password" class="form-control" id="name" placeholder="Enter the confirm password" value="{{ $user->password }}">
                  </div>
                 
               <div class="form-group">
                  <label>Role:</label>
                  <select class="form-control select2bs4"  style="width: 100%;"   name="roles[]">
                      @foreach($roles as $role)
                      <option value="{{ $role->id }}"
                      @if(in_array($role->id, $userRoles) ) selected @endif>{{ $role->name }}</option>
                      @endforeach
</select>
                  </div>

                  <input type="hidden" name="is_admin" value="a">
                 
                
                 <!-- <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2bs4" name="status" style="width: 100%;" id="status">
                 
                    <option value="1" @if ($user->status == '1') selected="selected" @endif>Active</option>
                    <option value="0" @if ($user->status == '0') selected="selected" @endif>DeActive</option>  
                    </select>
                </div>-->


                  
            
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
  