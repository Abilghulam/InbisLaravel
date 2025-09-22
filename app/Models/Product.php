<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'brand', 'image', 'price', 'old_price', 'discount', 'stock', 'specs', 'type'
    ];
}

