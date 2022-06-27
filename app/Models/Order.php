<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Order extends Model
{
    use HasFactory, Notifiable;

         protected $fillable = [
        'order_number', 'user_id', 'guest_id','status', 'grand_total', 'item_count', 'payment_status', 'payment_method',
      'delivery','name', 'email', 'address', 'city', 'country', 'post_code', 'phone_number','first_name','last_name','apartment','state'];


      public function carts()
      {
          return $this->hasMany(Cart::class);
      }

     


}
