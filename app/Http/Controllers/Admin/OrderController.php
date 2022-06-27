<?php

namespace App\Http\Controllers\Admin;

use App\Models\Newsletter;
use App\Models\Order;
use App\Models\Deliver;
use App\Notifications\NewOrder;
use App\Notifications\NewDeliver;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function __construct(){
      $this->middleware('permission:newsletter-index', ['only' => ['newsletter']]);
    }


    public function pending(){
      
        return view('admin.product.order');

    }
    public function view_all(){
   
        $orders=Order::all();
        return view('admin.product.all',compact('orders'));
    }

    public function view_sale(){
        
        $orders=Order::all();
        return view('admin.product.sales',compact('orders'));
    }

    public function process(){
       
        return view('admin.product.process');

    }
    public function completed(){
        return view('admin.product.completed');
    }
    public function cancel(){
        return view('admin.product.cancel');
    }


    public function pending_product($id){

      

    }

    public function process_product($id){
        $order=Order::find($id);
             $order->status="processing";
             $order->save(); 

        session()->flash('success','product has been process mode');
       
            return redirect()->back();

    }
    public function completed_product($id){
        $order=Order::find($id);
        $order->status="completed";
        $order->save(); 
        
        $deliver=new Deliver();
        $deliver->order_id=$order->id;
        $deliver->save();

        $deliver->notify(new NewDeliver($deliver));

   session()->flash('success','product has been completed mode');
  
       return redirect()->back();

    }
    public function cancel_product($id){
        $order=Order::find($id);
        $order->status="decline";
        $order->save(); 

   session()->flash('success','product has been cancel');
       return redirect()->back();
    }

    public function view_pending_product($id){
        $order=Order::findorfail($id);
        return view('admin.Receipt.pending_order',compact('order'));

    }

    public function view_processing_product($id){
      
        $order=Order::findorfail($id);
        return view('admin.Receipt.pending_order',compact('order'));
    }

    public function view_completed_product($id){
        $order=Order::findorfail($id);
        return view('admin.Receipt.pending_order',compact('order'));

    }

    public function view_cancel_product($id){
        $order=Order::findorfail($id);
        return view('admin.Receipt.pending_order',compact('order'));

    }

    public function newsletter(){
        
        return view('admin.Receipt.newsletter');

    }
    
      public function   newsletter_destroy($id){
          $new=Newsletter::where('id',$id)->first();
          $new->delete();
          session()->flash('error','Newsletter Deleted Succesfully');
          return redirect()->back();
        
    }


   public function cancel_order($id){
         
         $new=Order::where('id',$id)->first();
          $new->delete();
          session()->flash('error','Order Deleted Succesfully');
          return redirect()->back();
        
    }





    //
}
