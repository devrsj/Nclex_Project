<?php

namespace App\Http\Controllers\Front;

use App\Models\OrderAskQuestion;
use App\Models\AskQuestion;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{

    public function index(){
        return view('front.pages.cart');
    }

    public function add(Request $request,$id){

        $product=Product::find($id);
        $q=$request->quantity;
        $cart=session()->get('cart');
       
   
        if(!$cart){
            if($request->quantity > 1){
                $cart=[
                    $product->id =>[     
                        'id' => $product->id,
                        "category_id"=> $product->category_id,
                        'name'=>$product->name,
                        'quantity' => $q,
                        'sp'=>$product->sp,
                        'photo'=> $product->banner,
                        'slug'=>$product->slug
                    ]
                  ];
            }else{
            $cart=[
              $product->id =>[     
                  'id' => $product->id,
                  "category_id"=> $product->category_id,
                  'name'=>$product->name,
                  'quantity' => 1,
                  'sp'=>$product->sp,
                  'photo'=> $product->banner,
                  'slug'=>$product->slug
              ]
            ];
        }
   session()->put('cart',$cart);
   return redirect()->back()->with('success','Product Added To Cart');
       

}

        if(isset($cart[$product->id])){
           if($cart[$product->id]['category_id']==null){
            return redirect()->back()->with('success','Already Added To Cart');
           }else{
            if($request->quantity > 1){
                $p=$cart[$product->id]['quantity'];    
               $cart[$product->id]['quantity']=$p+ $q;
            }else{
            $cart[$product->id]['quantity']++;
            }
            session()->put('cart',$cart);
        
            return redirect()->back()->with('success','Product Added To Cart');
           }
        }

        if($request->quantity >1){
            $cart[$product->id]=[   
                'id' => $product->id,
                'name'=>$product->name,
                "category_id"=> $product->category_id,
                'quantity' =>$request->quantity,
                'sp'=>$product->sp,
                'photo'=>$product->banner,
                'slug'=>$product->slug
            ];
        }else{
             $cart[$product->id]=[   
            'id' => $product->id,
            'name'=>$product->name,
            "category_id"=> $product->category_id,
            'quantity' => 1,
            'sp'=>$product->sp,
            'photo'=>$product->banner,
            'slug'=>$product->slug
        ];
    }
        session()->put('cart',$cart);
        
      return redirect()->back()->with('success','Product Added To Cart');
      
    }

    public function destroy($id){
   
        $cart=session()->get('cart');
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);
    return redirect()->back()->with('success','Product Deleted From Cart');
        }

      }

public function hello(){
        
$total=0;

if(session('cart')){
  $r=count(Session('cart'));
                   
    }
    $twe="";


    $twe.='<span class="item_count">'.$r.'</span>';
    $response="";
    $outputs="";
    $outputs2="";

$outputs.='<span class="item_count">'.$r.'</span>';


    $outputs2 .='<div class="mini_cart">'.
   '<div class="cart_gallery">'.
            '<div class="cart_close">'.
                '<div class="cart_text">'.
                    '<h3>cart</h3>'.
                '</div>'.
               '<div class="mini_cart_close">'.
                    '<a href="javascript:void(0)">'.
                    '<i class="ion-android-close"></i></a>'.
                '</div>'.
            '</div>'; 
            if(session('cart')){                   
                                foreach(session('cart') as $id => $product){
                                               
                                        $sub_total=$product['sp'] * $product['quantity'];
                                          $total +=$sub_total;
                                                
                                                        
          
            
           $outputs2 .='<div class="cart_item">'.
              '<div class="cart_img">'.
  '<a href="#">'.
'<img src="'.url('/').'/public/storage/posts/'.$product['photo'].'" alt=""></a>'.
                '</div>'.
                '<div class="cart_info">'.
                    '<a href="#">'.$product['name'].'</a>'.
'<p><span>'.$product['quantity'].' *'.$product['sp'].'</span></p>'.
                '</div>'.
                '<div class="cart_remove">'.
                    '<a href="'.route('remove.cart',[$id]).'">'.
                    '<i class="ion-android-close"></i></a>'.
                '</div>'.
            '</div>';
            }
        $outputs2 .='</div>'.
        '<div class="mini_cart_table">'.
            '<div class="cart_table_border">'.
                '<div class="cart_total">'.
                    '<span>Sub total:</span>'.
                    '<span class="price">Npr'.$total.'</span>'.
                '</div>'.
                '<div class="cart_total mt-10">'.
                    '<span>total:</span>'.
                    '<span class="price">Npr'.$total.'</span>'.
                '</div>'.
            '</div>'.
        '</div>'.
        '<div class="mini_cart_footer">'.
            '<div class="cart_button">'.
                '<a href="'.route('cart').'">View cart</a>'.
            '</div>'.
           
            '<div class="cart_button">'.
                '<a href="'.route('checkout.index').'">'.
                '<i class="fa fa-sign-in"></i> Checkout</a>'.
            '</div>'.
        '</div>';
            }else{
        $outputs2 .='<h4>Empty Cart</h4>';
            }
        $outputs2.='</div>'.
    '</div>';

$response = [
    'outputs' => "hy",
    'outputs2' => "hello",
     
];   


    }
    
    
    
  
  
  public function removecart(){

    $remove="";
    $remove1="";
    $total=0;
    $remove .='<table class="table">'.
    '<thead>'.
        '<tr>'.
            '<th class="product_remove">remove</th>'.
            '<th class="product-thumbnail">images</th>'.
            '<th class="cart-product-name">Product</th>'.
            '<th class="product-price">Unit Price</th>'.
            '<th class="product-quantity">Quantity</th>'.
            '<th class="product-subtotal">Total</th>'.
        '</tr>'.
    '</thead>'.    
    '<tbody>';
                                  
    if(session('cart')){ 

                       
    foreach(session('cart') as $id => $product){
   $sub_total=$product['sp'] * $product['quantity'];
  $total +=$sub_total;
 

        $remove .='<tr>'.
    '<td class="product_remove">'.

'<button type="button" class="deletecart" value="'.$id.'">'.
'<i class="pe-7s-close" title="Remove"></i> </button>'.
'<a href="'.route('remove.cart',[$id]).'">'.
'<i class="pe-7s-close" title="Remove"></i>'.
'</a>'.
'</td>'.
'<td class="product-thumbnail">'.
     '<a href="#">'.
     '<img src="'.url('/').'/public/storage/posts/'.$product['photo'].'" alt=""></a>'.
            '</td>'.
'<td class="product-name"><a href="#">'.$product['name'].'</a>'.
            '</td>'.
'<td class="product-price">'.
'<span class="amount">Rs.'.$product['sp'].'.00</span></td>'.
'<td class="product_pro_button quantity"> 0'.
'</td><td class="product-subtotal">'.
'<span class="amount">Rs.'.$sub_total.'.00</span></td>'.
'</tr>';
    }
     
}else{ 
    $remove .='<tr>'.
        '<th cols="5" rows="40">'.                           
'<div class="alert alert-warning">'.
   '<strong>Oops!! Empty Cart </strong>'.
 '</div>'.
'</th>'.
'</tr>';
}
 
    $remove .='</tbody>'.
    '</table>';
                                 
    
      $response = [
     'remove' => $remove,
     'remove1' => $remove1,    
      ];   
 
  return Response()->json($response);
 
 
   }
 



  public function changeQty(Request $request,Product $product){

    $cart=session()->get('cart');

    if($request->change_to=="down"){

        if(isset($cart[$product->id])){

            $cart[$product->id]['quantity']--;
            session()->put('cart',$cart);
            return redirect()->back()->with('success','Quantity Updated');
        }
    
    }else{

        if(isset($cart[$product->id])){

            $cart[$product->id]['quantity']++;
            session()->put('cart',$cart);
            return redirect()->back()->with('success','Quantity Updated');
        }
    
    }
  }
 



  }







    //

