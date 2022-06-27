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
                <h3 class="card-title">Add News & Events</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   method="post" action="{{ route('news.update',$new->id) }}" enctype="multipart/form-data">
              
              @method('PUT')
              @csrf


                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Select page name" value="{{ $new->name }} ">
                  </div>
             

         <div class="form-group" id="description">
           <label>Description</label>
        <textarea id="summernote" name="description">
         {{ $new->description }}
            
         </textarea>
          </div>



                   <div class="form-group">
                    <label for="">Banner</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="" name="banner">
                      </div>
                    </div>      
                  </div>

                  <div class="form-group" id="image_show">
                     @if($new->banner==null)
                     <label><strong>No images</strong></label>
                     @else
                  <img src="{{ url('/') }}/public/storage/posts/{{  $new->banner  }}" height="50px" width="50px">
                   
                   @endif </div>

                  <div class="form-group">
                    <label for="">Images</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="" name="image">
                      </div>
                    </div>      
                  </div>
                  <div class="form-group" id="image_show">
                     @if($new->image==null)
                     <label><strong>No images</strong></label>
                     @else
                  <img src="{{ url('/') }}/public/storage/posts/{{  $new->image  }}" height="50px" width="50px">
                   
                   @endif </div>
           
                  <div class="form-group">
                <label>Multiple Images</label>
                <div class="input-group">
                      <div class="custom-file">
                <input type="file" id="upload_file" name="upload_files[]" onchange="preview_image();" multiple>
                </div>
                </div>
               </div>

               <div class="form-group">
                @if(is_array(json_decode($new->multiple_image)))
											@foreach (json_decode($new->multiple_image) as $key => $photo)
                      <img src="{{ url('/') }}/public/storage/posts/{{ $photo  }}" height="50px" width="50px">         
                      @endforeach
                      @endif
                       </div>
        
          <div id="image_preview"></div>
           
                


                  <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" value="{{ $new->location }}" name="location" class="form-control">
                  </div>            
           
                  <div class="form-group">
                    <label for="location">Date</label>
                    <input type="date" value="{{ $new->date }}" name="date" class="form-control">
                  </div>  

                  <div class="form-group">
                    <label for="location">Time</label>
                    <input type="text" value="{{ $new->time }}" name="time" class="form-control" placeholder="11:45 AM Or PM">
                  </div> 
       
                  <div class="form-group">
                    <label for="">Google Map</label>
                    <input type="text" value="{{ $new->google_map }}" name="google_map" class="form-control">
                  </div>    
                  
      
                <div class="form-group">
                    <label for="">Weight</label>
                    <input type="number" value="{{ $new->weight }}" name="weight" class="form-control" min="1">
                  </div>   
             
                  <div class="form-group">
                    <label for="weight">Slug</label>
                    <input type="text" value="{{ $new->slug }}" name="slug" class="form-control" min="1">
                  </div>   
                  <div class="form-group">
                    <label for="meta_title">Meta title</label>
                    <input type="text" name="meta_title" class="form-control"  placeholder="Enter the meta title" value="{{ $new->meta_title }}">
                        </div>
                        
                        

                <div class="form-group">
                  <label>Meta description</label>
 <textarea  name="meta_description" value="" rows="3" style="width:100%"> {{ $new->meta_description }}</textarea>
                </div>

                
                  
                  <div class="form-group">
                  <label>Publish Status</label>
                  <select class="form-control select2bs4" name="status" style="width: 100%;" id="blog_type">
           
                    <option value="1" @if ($new->status == '1') selected="selected" @endif >Active</option>
                    <option value="0" @if ($new->status == '0') selected="selected" @endif>DeActive</option>
                    </select>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
  function preview_image() 
{
 var total_file=document.getElementById("upload_file").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<img src='"+URL.createObjectURL(event.target.files[i])+"' height='120px' width='100px'><br>");
 }
}
</script>

  @endsection
  