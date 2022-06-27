<?php

namespace App\Models;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=['id','slug','photo','order_id','product_name','product_id','user_id','guest_id','quantity','price','sub_total'];


 public function products()
    {
        return $this->hasMany(Product::class);
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }


}
