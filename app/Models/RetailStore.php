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
        'description',
        'address',
        'image',
        'social_media',
        'map_iframe',
    ];
}
