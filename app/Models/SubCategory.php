<?php

namespace App\Models;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubUnderCategory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SubCategory extends Model
{
    use HasFactory;

protected $fillable=['user_id','is_admin','name',
    'meta_title','meta_description','banner','weight','status','category_id','slug'];
    //

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    
    public function subundercategories()
    {
        return $this->hasMany(SubUnderCategory::class,'subcategory_id','id','price','name','image');
    }

    public function products(){
        return $this->hasMany(Product::class,'subcategory_id','id');
    }
    
 


}

  