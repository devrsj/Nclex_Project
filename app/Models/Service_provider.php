<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service_provider extends Model
{
    use HasFactory;
    protected $fillable=['user_id','name','email','description','image','product_id','deleted_at','status'];
}
