<?php

namespace App\Models;

use App\Models\BlogCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

    protected $fillable=['blog_type','heading','short_description','banner','description','image','published_by','author',
    'category_id','weight','meta_title','meta_description','meta_keyword','slug','status'];


    public function category(){
        return $this->belongsTo(BlogCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function hasTag($tagId){
        return in_array($tagId,$this->tags->pluck('id')->toArray());

    }

    public function scopeSearched(){

    $search=request()->query('search');
     if(!$search){
         return $query;
     }


return $query->where('name','LIKE','%'.$search.'%');

    }
    
 


    
}
