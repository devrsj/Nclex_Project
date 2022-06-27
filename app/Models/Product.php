<?php

namespace App\Models;

use App\Models\FlashDeal;
use App\Models\Product_Attribute;
use App\Models\Product_Attribute_Value;
use App\Models\TagProduct;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Product extends Model
{
    use HasFactory;    

 protected $fillable=['is_admin','user_id','name','category_id','subcategory_id','subundercategory_id','short_description','brand_id','description','banner','image','quantity','mp',
 'sp','shipping_day','shipping_cost','return_days','warranty','sku','tax_name','tax_rate','stock','featured_product','discount','favicon','attribute_id','rating','meta_title','meta_description','weight','status','slug'];
    
   
    public function category(){
    return $this->belongsTo(Category::class);
    }


   public  function subcategory(){
       return $this->belongsTo(Subcategory::class);
   }


   public function subundercategory(){
      return $this->belongsTo(Subundercategory::class);
  }

     public function cart()
     {
        return $this->belongsTo(Cart::class);
    }

    public function tagproducts()
    {
        return $this->belongsToMany(TagProduct::class);
    }


    public function productattributevalues()
    {
        return $this->belongsToMany(Product_Attribute_Value::class);
    }

    public function productattributes()
    {
        return $this->belongsToMany(Product_Attribute::class);
    }

    public function flashdeals(){
        return $this->belongsToMany(FlashDeal::class);
    }


    public function hasTagproduct($tagproductId){
        return in_array($tagproductId,$this->tagproducts->pluck('id')->toArray());
    }
  

    public function hasFlashproduct($flashproduct){
    return in_array($flashproduct,$this->flashdeals->pluck('id')->toArray());
    }

    public function hasTagproductattribute($tagproductattributeId){
        return in_array($tagproductattributeId,$this->productattributevalues->pluck('id')->toArray());

    }
  



}
