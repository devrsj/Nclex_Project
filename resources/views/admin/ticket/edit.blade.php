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
                <h3 class="card-title">Ticket Id By:{{  $ticket->ticket_code }}#  </h3>
                @php
     $username=Db::table('users')->where('id',$ticket->user_id)->select('name')->first();
                  @endphp
                  <br>

                <p>Mr:{{ $username->name }},  {{ $ticket->created_at }}  <span class="badge badge-secondary">{{ $ticket->status }}</span></p>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form   method="post" action="{{ route('ticket.update',$ticket->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')


                <div class="card-body">
                 
                  <div class="form-group">
                    <label for="name">Problem:{{ $ticket->problem }}</label>
                    <br>
                   
                    <label for="">{!! $ticket->description !!}</label>
                
                  </div>
                  <!--<p>Mr:{{ $username->name }},  {{ $ticket->created_at }} </p>-->
                  <hr>
                  @php
                
                $replies=Db::table('ticket__replies')->where('ticket_id',$ticket->id)->get();
                @endphp
                
                  @foreach($replies as $reply)
                 
                  <div class="form-group">
                   
                    <label for="">{!! $reply->description !!}</label>
                    <br>
                  </div>
                  <p>{{ $reply->created_at }}</p>
                  <hr>
                  @endforeach
                  
              
                  @if($ticket->status=="close")

@elseif($ticket->status=="Pending")
            <div class="form-group">  
            <textarea id="summernote" name="reply">
             {{ old('reply') }}
              </textarea>
               </div>
             <input type="hidden" value="{{ $ticket->ticket_code }}" name="ticket_code">
             <input type="hidden" value="{{ $ticket->user_id }}" name="user_id">
<input type="hidden" value="Pending" name="status">
    @if(Auth()->user()->is_admin=="a")
                <div class="form-group">
                  <label>Status</label>
                  <select class="form-control select2bs4" name="status" style="width: 100%;" id="">
           
                    <option value="Pending" @if (old('status') == 'Pending') selected="selected" @endif >Pending</option>
                    <option value="close" @if (old('status') == 'close') selected="selected" @endif>Close</option>
                    </select>
                </div>
                </div>
                @endif

                <!-- /.card-body -->
              
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Reply</button>
                </div>

                @endif
                
       
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
  