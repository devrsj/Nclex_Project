<?php

namespace App\Http\Controllers\Front;

use App\Notifications\NewOrder;
use App\Models\Order;
use App\Models\Cart;
use Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;
use Auth;




class CheckoutController extends Controller
{

	public function getCheckout(){

    if (Auth::user()){
         if(session('cart')){
        return view('front.pages.checkout');
         }else{
  session()->flash('success','Your Cart is Empty');
  return redirect(url('/'));
         }
        }else{
      session()->flash('success','Please Login First');
      return redirect(url('/')); 


        }
}



         public function placeOrder(Request $request){

          $shippment=session()->get('shippment');
          $shippment=[       
            'name'=>$request->name,
            'email' => $request->email,
            "address" => $request->address,
            "city" => $request->city,
            "country" => $request->country,
            "post_code" => $request->post_code,
            "phone_number" => $request->phone_number,
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "apartment" => $request->apartment,
            "state" => $request->state       
      ];
          
        session()->put('shippment',$shippment);
        session()->save();
        return redirect()->route('checkout.index');

         }



		public function delivery(Request $request){ 

    $data=$request->session()->get('shippment');
   

      if(session('cart')){  
      return view('front.pages.delivery');
         }else{
          session()->flash('success','Your Cart is Empty');
          return redirect(url('/'));
    }
  }


    public function delivery_place(Request $request){
  

      $delivery=session()->get('delivery');
      $delivery=[
           
        'delivery'=>$request->delivery,
  ];

      session()->put('delivery',$delivery);
      session()->save();
      return redirect()->route('payment.type');

    }

    public function payment(Request $request){

      
    $dat=$request->session()->all();
  
           
      if(session('cart')){
             
    $ptotal=0;
     

 foreach(session('cart') as $id => $produc){

$psub_total=$produc['sp'] * $produc['quantity'];
$ptotal +=$psub_total;
 
      }
            $random = rand(1000000000000,9999999999999);  
       
        return view('front.pages.payment',compact('ptotal','random'));
           }else{
            session()->flash('success','Your Cart is Empty');
            return redirect(url('/'));

           }

    }


    public function payment_store(Request $request){
     
      $payment=session()->get('payment');
      $payment=[    
        'payment'=>"cash"
      ];

      session()->put('payment',$payment);
      session()->save();

      return redirect()->route('success.order');

    }


    public function success_order(Request $request){


if(session('cart')){

      $shippment=session()->get('shippment');
      $actualrate=Session::get('actualrate');
      $delivery=session()->get('delivery');
      $payment=session()->get('payment');
      $cart=session()->get('cart');
      $guest = rand(1000000000000,9999999999999);
      $random = rand(1000000000000,9999999999999);
     $total=0;
     $quan=0;    
$order="";

  foreach(session('cart') as $id => $produc){
     $sutotal=$produc['sp'] * $produc['quantity'];
     $quan=$produc['quantity'];
     if(session('actualrate')){
       $total= Session::get('actualrate');
     }else{
      $total +=$sutotal;
     }
          
     


   }

if(Auth::user()){
$order= new Order();

    $order->order_number =$random;
    $order->user_id =Auth()->user()->id;
    $order->guest_id=null;
    $order->grand_total = $total;
    $order->item_count = $quan;
    $order->payment_method =session('payment')['payment']; 
    $order->email=session('shippment')['email']; 
    $order->address=session('shippment')['address']; 
    $order->city = session('shippment')['city'];
    $order->country=session('shippment')['country']; 
    $order->post_code=session('shippment')['post_code']; 
    $order->phone_number=session('shippment')['phone_number']; 
    $order->payment_status="0"; 
    $order->first_name= session('shippment')['first_name'];
    $order->last_name=session('shippment')['last_name']; 
    $order->apartment=session('shippment')['apartment']; 
    $order->state=session('shippment')['state']; 
    $order->save();

    $order->notify(new NewOrder($order));

}

  foreach(session('cart') as $id => $product){
     $sub_total=$product['sp'] * $product['quantity'];
     $quan += $product['quantity'];
     $total +=$sub_total;
    
     if(Auth::user()){
        Cart::create([
          "order_id"=>$order->id,
         "product_id"=> $product['id'],
         "user_id" => Auth()->user()->id,
         "product_name"=>$product['name'],
         "guest_id" =>null,
         "quantity" =>$product['quantity'],
         "price" =>$product['sp'],
         "sub_total" =>$sub_total,
           "photo"=>$product['photo']
      ]);
     }else{
      Cart::create([
           "order_id"=>$order->id,
        "product_id"=> $product['id'],
        "user_id" =>null,
          "product_name"=>$product['name'],
          "guest_id" => $guest,
          "quantity" =>$product['quantity'],
          "price" =>$product['sp'],
          "sub_total" =>$sub_total,
          "photo"=>$product['photo'],
          "slug"=>$product['slug']
      ]);

     }
     }

      session()->flash('success','Sucesfully order an product');
      session()->forget('shippment');
      session()->forget('payment');
      session()->forget('cart');
      session()->forget('actualrate');
      $data["email"] ="devrajchy574@gmail.com";
      $data["title"] ="New Order has been arrived";
  
      Mail::send('emails.orderconfirm', $data, function($message)use($data) {
          $message->to($data["email"], $data["email"])
                  ->subject($data["title"]);
      });




        return view('front.pages.order_confirm');
           }else{
            session()->flash('success','Your Cart is Empty');
            return redirect()->back();

           }



      
    }


    

	
    //
}
