@extends('front.layouts.master')
@section('content')
@php

$new_orders=App\Models\Order::where('user_id',Auth()->user()->id)->OrderBy('id','desc')->get();
$i=1;
$gender=Auth()->user()->gender; 
$user_info=App\Models\Address::where('user_id',Auth()->user()->id)->first();
@endphp



<!-- breadcrumbs area start -->
<div class="breadcrumbs_aree breadcrumbs_bg mb-110" data-bgimg="{{ asset('front_assets/assets/img/others/breadcrumbs-bg.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs_text">
                    <h1>My Account</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home </a></li>
                        <li> // My Account</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumbs area end -->
<div class="account-page-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab" href="#account-dashboard" role="tab" aria-controls="account-dashboard" aria-selected="true">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="personal-tab" data-bs-toggle="tab" href="#personal" role="tab" aria-controls="personal" aria-selected="false">Personal Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders" role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details" role="tab" aria-controls="account-details" aria-selected="false">Change Password</a>
                    </li>
                    <li class="nav-item">
                    <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                     Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                    <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel" aria-labelledby="account-dashboard-tab">
                        <div class="myaccount-dashboard">
                            <p>Hello <b>{{ Auth()->user()->name }}</b></p>
                            <p>From your account dashboard you can view your recent orders, manage your shipping and
                                billing addresses and <a href="javascript:void(0)">edit your password and account
                                    details</a>.</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="personal" role="tabpanel" aria-labelledby="personal-tab">
                        <div class="mypersonal">
                            <h4 class="small-title">PERSONAL DETAILS</h4>
                            <form method="post" action="{{ route('user.update',Auth()->user()->id) }}" class="myaccount-form">
                            @csrf    
                            <div class="myaccount-form-inner">
                                    <div class="single-input single-input-half">
                                        <label>Name*</label>
                                        <input type="text" name="name" value="{{ Auth()->user()->name }}">
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Email*</label>
                                        <input type="text" name="email" value="{{ Auth()->user()->email }}">
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Address</label>
                                        <input type="text" name="address"  value="{{  $user_info->address }}">
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Phone Number</label>
                                        <input type="text" name="number" value="{{ Auth()->user()->number }}">
                                    </div>
                                    
                                          <div class="col-sm-6">
                                         <div class="single-input">
                                        <label>Country</label>
                                        <select  name="country" class="form-control" style="width:100%">
                                       <option value="nepal">Nepal</option>                          
                                         </select>
                                         </div>
</div>
<div class="col-sm-6">
                                         <div class="single-input">
                                        <label>State</label>
        <select class="form-control"  name="state" style="width:100%">
        <option value="state1"  @if ($user_info->state == 'state1') selected="selected" @endif >Province 1</option>
        <option value="state2" @if ($user_info->state == 'state2') selected="selected" @endif>Province 2</option>
         <option value="state3" @if ($user_info->state == 'state3') selected="selected" @endif>Province 3</option>
         <option value="state4" @if ($user_info->state == 'state4') selected="selected" @endif>Province 4</option>
          <option value="state5" @if ($user_info->state == 'state5') selected="selected" @endif>Province 5</option>
</select>                 
                                         </div></div>
                                         <br>
                                         <div class="single-input single-input-half">
                                        <label>City</label>
                                        <input type="text" name="city" value="{{ $user_info->city }}">
                                         </div>
                                         

                                         

                                        
                                         

                                    <div class="single-input">
                                        <label>Date of Birth</label>
                                        <input type="date" name="dob" value="{{ $user_info->dob }}">
                                    </div>
                                    <div class="single-input single-input-half">
                                        <label>Postal Code</label>
                                        <input type="text" name="postal_code" value="{{ $user_info->postal_code }}">
                                         </div>
                                

                                    <div class="single-input">
                                        <button class="btn custom-btn" type="submit">
                                            <span>SAVE CHANGES</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="account-orders" role="tabpanel" aria-labelledby="account-orders-tab">
                        <div class="myaccount-orders">
                            <h4 class="small-title">MY ORDERS</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ORDER</th>
                                            <th>DATE</th>
                                            <th>STATUS</th>
                                            <th>TOTAL</th>
                                            <th></th>
                                        </tr>
                                        @if($new_orders->count() > 0)
                                        @foreach($new_orders as $new_order)
                                        <tr>
                                            <td><a class="account-order-id" href="javascript:void(0)">#{{ $new_order->order_number }}</a></td>
                                            <td>{{ $new_order->created_at }}</td>
                                            <td>{{ $new_order->status }}</td>
                                            <td>{{ $new_order->grand_total }}</td>
                                            <td><a data-bs-toggle="modal" data-bs-target="#order-detail-modal{{ $new_order->id }}" href="javascript:void(0)" class="btn btn-secondary btn-primary-hover"><span>View</span></a>
                                            </td>
 <div class="modal fade order-detail-modal" id="order-detail-modal{{ $new_order->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">

    <div class="modal-content p-4">
      
         <a href="void:" data-bs-dismiss="modal" style="position:absolute; right: 20px; font-size: 2rem" class="close"><i class="fa fa-times pe-7s-close"></i></a>
        <div class="order-number d-flex align-items-center justify-content-between">
            <p>Order Number: <b>{{ $new_order->order_number }}</b></p>

        </div>
        <hr>
        <div class="order-status">
            <p class="mb-3">Shipment 1/1 status: <b>Arriving Jan 21<sup>st</sup></b></p>
            
            <div class="process-line d-flex align-items-center justify-content-between mb-3">
                <span class="num"><i class="pe-7s-check"></i></span>
                <div class="line line1"></div>
                <span class="num">2</span>
                <div class="line line2"></div>
                <span class="num">3</span>
                
         
            </div>

            <div class="line-info flex-wrap d-flex align-items-center justify-content-between mb-5">
               <p><span class="font-weight-bold"></span> <br>
                    5:04 PM, SEP 30, 2021
                </p>
                <p><span class="font-weight-bold">SHIPPING</span> <br> JAN 15</p>
                <p><span class="font-weight-bold">TO DELIVER</span> <br> Estimated Date: Oct 21</p>
           
            </div>
        </div>
        <div class="checkout">
            <div class="detail-box order-list">
                <div class="card">
                    <div class="card-head d-flex align-items-center">
                        <i class="fas fa-shopping-cart pe-7s-cart"></i>
                        <h6 class="font-weight-bold">ITEMS ORDERED</h6>
                    </div>
                    <div class="shopping-cart-title ">
                        <div class="row no-gutters mt-4 px-5">
                            <div class="col-lg-6 col-md-6">
                                <h6 class="title ps-3">PRODUCT NAME</h6>
             @php
             $order_products=App\Models\Cart::where('user_id',Auth()->user()->id)->where('order_id',$new_order->id)->OrderBy('id','desc')->get();
              @endphp   

   

                          @foreach($order_products as $order_product)
                           @php
                   $n=App\Models\Product::where('id',$order_product->product_id)->first();
                           @endphp
                                     

                                <div data-mh="e2" class="content d-flex align-items-center">
                                    <a href="#"><img src="{{ url('/') }}/public/storage/posts/{{ $n->banner }}" alt="#"></a>
                                    <h6><a href="#">{{ $order_product->name }} </a> </h6>
                                </div>
                                
                                @endforeach
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <h6 class="title">QUANTITY</h6>
                                @foreach($order_products as $order_product)         
                               
                                <div class="content d-flex align-items-center">
                                    <input disabled type="number" value="{{ $order_product->quantity }}" class="text-center">
                                   
                                </div>
                                @endforeach
                              
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <h6 class="title">UNIT PRICE</h6>
                                @foreach($order_products as $order_product)         
                              
                                <div class="content d-flex align-items-center">
                                    <h6>Rs.{{ $order_product->price }}</h6>
                                </div>
                                @endforeach
                              
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <h6 class="title">TOTAL</h6>
                                @foreach($order_products as $order_product) 
                                <div class="content d-flex align-items-center">
                                    <h6>Rs.{{ $order_product->sub_total }}</h6>
                                </div>
                                @endforeach
                             
                            </div>
                        </div>
                        <div class="row mx-1 no-gutters sub-total">
                            <div class="col-lg-6 col-md-6">
                                <h6 class="my-3 text-muted font-weight-bold ps-2">SUB-TOTAL:</h6>
                            </div>
                            <div class="col-lg-2 col-md-2 offset-lg-4 offset-md-4">
                                <h6 class="my-3 font-weight-bold">Rs. {{ $new_order->grand_total }}</h6>
                            </div>
                           
                           
                            <div class="col-lg-6 col-md-6">
                                <h6 class="my-3 text-muted font-weight-bold ps-2">TOTAL:</h6>
                            </div>
                            <div class="col-lg-2 col-md-2 offset-lg-4 offset-md-4">
                                <h6 class="my-3 red font-weight-bold">Rs.{{ $new_order->grand_total }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
  </div>
</div>



                                        </tr>   
                                         
                                        @endforeach
                                        @else
                                        <tr>  
                                        <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="alert alert-warning">
                               <strong>Oops!! sorry you havent order any items </strong> 
                             </div>
                                    </div>
                                    </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                   
                    <div class="tab-pane fade" id="account-details" role="tabpanel" aria-labelledby="account-details-tab">
                        <div class="myaccount-details">
                            @if ($errors->any())
<div class="alert alert-danger">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
                              <form method="post" action="{{ route('user.password.change') }}">
                                @csrf  
                              <div class="myaccount-form-inner">
                                   
                                    <div class="single-input">
                                        <label>Current Password(leave blank to leave
                                            unchanged)</label>
                                        <input type="text" autocomplete="new-password" name="current_password" class="form-control">
                                    </div>
                                    <br>
                                    <div class="single-input">
                                        <label>New Password (leave blank to leave
                                            unchanged)</label>
                                        <input type="text" name="new_password" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="single-input">
                                        <label>Confirm New Password</label>
                                        <input type="password"  name="new_confirm_password" class="form-control" required>
                                    </div>
                                    <br>
                                    <div class="single-input">
                                        <button class="btn custom-btn" type="submit">
                                            <span>SAVE CHANGES</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection