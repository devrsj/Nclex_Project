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
                <h3 class="card-title">Add Answer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   method="post" action="{{ url('admin/answer',$popup->id) }}">
                @csrf
            
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Question Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Select page name" value="{{ $popup->name }}" readonly="readonly">
                  </div>

                  <div class="form-group">
                    <label for="">Option1</label>
                    <input type="text" name="option1" value="{{ $answer->option1 }}" class="form-control" id="" placeholder="">
                  </div>
                 
                  <div class="form-group">
                    <label for="">Option2</label>
                    <input type="text" name="option2" value="{{ $answer->option2 }}" class="form-control" id="" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="">Option3</label>
                    <input type="text" name="option3" value="{{ $answer->option3  }}" class="form-control" id="" placeholder="">
                  </div>
                 
                  <div class="form-group">
                    <label for="name">Option4</label>
                    <input type="text" name="option4" value="{{ $answer->option4 }}" class="form-control" id="" placeholder="">
                  </div>

                  <div class="form-group">
                  <label>Correct Answer</label>
                  <select class="form-control select2bs4" name="correct_answer" style="width: 100%;" id="">
                    <option value="option1" @if ($answer->correct_answer == 'option1') selected="selected" @endif >Option1</option>
                    <option value="option2" @if ($answer->correct_answer == 'option2') selected="selected" @endif>Option2</option>
                    <option value="option3" @if ($answer->correct_answer == 'option3') selected="selected" @endif >Option3</option>
                    <option value="option4" @if ($answer->correct_answer == 'option4') selected="selected" @endif>Option4</option>
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
  
  

  @endsection
  