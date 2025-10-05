<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = 'about_us';

    protected $fillable = [
        'description',
        'video_url',
        'rating',
        'reviews_count',
        'years_experience',
        'brand_partners',
        'retail_stores',
    ];
}
