<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = ['id','CarName', 'brand', 'model', 'year', 'CarType', 'daily_rent_price', 'status', 'CarImage', 'created_at', 'updated_at'];
}
