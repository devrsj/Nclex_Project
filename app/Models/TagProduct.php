<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagProduct extends Model
{
    use HasFactory;
    protected $fillable=['is_admin','user_id','name','weight','banner','slug'];

    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
