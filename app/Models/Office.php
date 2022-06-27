<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{

    protected $fillable=["city","city_loction","google_map","number","email","weight","status"];
    use HasFactory;
}
