<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogPromo extends Model
{
    use HasFactory;

    protected $table = 'catalog_promos';

    protected $fillable = [
        'category',
        'title',
        'subtitle',
    ];

    /**
     * Ambil promo global (tanpa kategori)
     * Jika tidak ada, fallback ke promo pertama
     */
    public static function getGlobalPromo()
    {
        return self::whereNull('category')->first() ?? self::first();
    }
}
