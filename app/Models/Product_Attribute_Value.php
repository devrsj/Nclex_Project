<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Attribute_Value extends Model
{
    use HasFactory;
    
    protected $fillable=["user_id","is_admin","name","product_attribute_id","weight","status"];


}
