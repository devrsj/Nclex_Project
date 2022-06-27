<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Default_Currency extends Model
{
    use HasFactory;
    protected $fillable=["oldcurrecny_id","default_currency"];
}
