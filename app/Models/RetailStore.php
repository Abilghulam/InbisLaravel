<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RetailStore extends Model
{
    use HasFactory;

    protected $table = 'retail_stores';

    protected $fillable = [
        'name',
        'image',
        'address',
        'facebook',
        'instagram',
        'map_iframe',
    ];
}
