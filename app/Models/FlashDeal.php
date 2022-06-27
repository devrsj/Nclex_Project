<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
    use HasFactory;
    
    protected $fillable=['is_admin','user_id','name','image','status','weight','start_date','end_date'];
  
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('discount', 'discount_type')
    	->withTimestamps();
    }

    
    public function getRouteKeyName(){
        return 'slug';
    }



}
