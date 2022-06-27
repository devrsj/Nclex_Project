<?php

namespace App\Http\Controllers\Front;
use App\Models\CouponUser;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wishlist;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
Use Session;
use Auth;

class WishlistController extends Controller
{


    public function add($id){
        
       if(Auth::user()){
        $product=Product::where('id',$id)->first();
        if($product !=null){           
            Wishlist::create([
                "product_id"=>$product->id,
                "product_name"=>$product->name,
                "user_id"=>Auth::user()->id,
                "price"=>$product->sp,
                "image"=>$product->banner,
            ]);
            session()->flash('success','Product Added to Wishlist');
            return redirect()->back(); 
        
        }else{
            abort('404');
        }
       }else{

        session()->flash('success','Please Login First');
      return redirect()->route('user.login.form'); 
       }
    }


    public function remove($id){
        $wishlist=Wishlist::find($id);
        if($wishlist !=null){
        $wishlist->delete();
        session()->flash('success','Wishlist Deleted Sucesfully');
      return redirect()->back();
        }else{
            abort('404');
        } 
    }

  public function cart_coupon(Request $request){

     $coupon_code=$request->coupon_code;
          if(Auth::user()){
            $coupon=Coupon::where('coupon_code',$coupon_code)->where('status',1)->first();
       if($coupon !=null){ 
        $due_date = Carbon::parse($coupon->expiry_date);
            $date = Carbon::now();
            $usage_limit=$coupon->usage_limit;
            $coupon_user=CouponUser::where('coupon_id',$coupon->id)->where('user_id',Auth()->user()->id)->first();
            $total=0;
            if(session('cart')){
               foreach(session('cart') as $id => $produc){
                   $sutotal=$produc['sp'] * $produc['quantity'];   
                   $total +=$sutotal;
                 }
               
            } 
        
        if($due_date->gte($date)){
            if($total >=$usage_limit){
                if($coupon_user ==null){      
                    $actual_rate=$total-$coupon->amount;
                   
                    Session::put('actualrate',$actual_rate);

                    CouponUser::create([
                        "user_id"=>Auth()->user()->id,
                        "coupon_id"=>$coupon->id
                    ]);

                    return view('front.pages.cart',compact('actual_rate'));
                         }else{
                            return redirect()->back()->with('success','You already use these coupons');
                         }
           }else{
            return redirect()->back()->with('success','You use these coupon code when  you shop more than Rs'.$usage_limit);
           }
        }else{
      return redirect()->back()->with('success','Sorry!! This coupon is  expired');
        }
     }else{
     return redirect()->back()->with('success','Sorry!! This coupon is not available');
     }
    }else{
      return redirect()->back()->with('success','Sorry!! coupon is  only available for registered user');
    }



  }
    //
}
