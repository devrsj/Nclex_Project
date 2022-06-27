<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteUser extends Model
{
    use HasFactory;

    protected $fillable=["ip_address","country_name","region_name","city_name","latitude","longitude","area_code","web_browser","device_name"," browser_version"," platform_version"];
}
