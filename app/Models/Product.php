<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'brand',
    'category',
    'level',
    'section',
    'stock',
    'old_price',
    'discount',
    'price',
    'specs',
    'image',
];

}

