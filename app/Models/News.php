<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    
    protected $fillable=['name','banner','image','multiple_image','description','location','date','time','google_map','meta_title','meta_description','weight','status','slug'];
 

}
