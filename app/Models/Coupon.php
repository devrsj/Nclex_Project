<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable=["coupon_code","discount_type","amount","linked_type","linked_id","usage_limit","expiry_date","registered_users","status"];

}
