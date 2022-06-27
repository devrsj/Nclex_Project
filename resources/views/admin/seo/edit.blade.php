@extends('admin.layouts.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
 
    <!-- Main content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-english" role="tab" aria-controls="pills-home" aria-selected="true">English</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-nepali" role="tab" aria-controls="pills-profile" aria-selected="false">Nepali</a>
  </li>
 
</ul>

        
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-english" role="tabpanel" aria-labelledby="pills-home-tab">
  
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit seo english information</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   method="post" action="{{ route('seo.update',$seo->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">              
                <div class="form-group">
                    <label for="geo_tag">Google Analytics:</label>
                    <input type="text" name="geo_tag" class="form-control" id="" placeholder="Geo Tag" value="{{ $seo->geo_tag }}">
                  </div>


              

                <div class="form-group" id="image">
                    <label for="">Favicon</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="" name="favicon">   
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                  <img src="{{ url('/') }}/public/storage/posts/{{  $seo->favicon  }}" height="50px" width="50px">
</div> 

              


                 


                   
                <div class="form-group">
                    <label for="meta_title">Meta Title:</label>
                    <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" value="{{ $seo->meta_title }}">
                  </div>


                   <div class="form-group">
                    <label for="meta_keyword">Meta Keyword:</label>
                    <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Meta Keyword" value="{{ $seo->meta_keyword }}">
                  </div>

               

                  
<div class="form-group">
                  <label>Meta description</label>
 <textarea  name="meta_description" value="{{ old('meta_description') }}" rows="4" style="width:100%"> {{ $seo->meta_description }}</textarea>

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
    </div>
    <div class="tab-pane fade show" id="pills-nepali" role="tabpanel" aria-labelledby="pills-home-tab">
  
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- jquery validation -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit seo nepali information</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form   method="post" action="{{ route('seo.update',$seo->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="card-body">              
              <div class="form-group">
                  <label for="geo_tag">Google Analytics:</label>
                  <input type="text" name="geo_tag" class="form-control" id="" placeholder="Geo Tag" value="{{ $seo->geo_tag }}">
                </div>


            

              <div class="form-group" id="image">
                  <label for="">Favicon</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="form-control" id="" name="favicon">   
                    </div>
                  </div>
                </div>
                <div class="form-group">
                <img src="{{ url('/') }}/public/storage/posts/{{  $seo->favicon  }}" height="50px" width="50px">
</div> 

            


               


                 
              <div class="form-group">
                  <label for="meta_title">Meta Title:</label>
                  <input type="text" name="meta_title" class="form-control" id="meta_title" placeholder="Meta Title" value="{{ $seo->meta_title }}">
                </div>


                 <div class="form-group">
                  <label for="meta_keyword">Meta Keyword:</label>
                  <input type="text" name="meta_keyword" class="form-control" id="meta_keyword" placeholder="Meta Keyword" value="{{ $seo->meta_keyword }}">
                </div>

             

                
<div class="form-group">
                <label>Meta description</label>
<textarea  name="meta_description" value="{{ old('meta_description') }}" rows="4" style="width:100%"> {{ $seo->meta_description }}</textarea>

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
  </div>
    </div>



    <!-- /.content -->
  </div>
    <!-- /.content -->
  
  

  @endsection
  