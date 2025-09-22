<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Informasi dasar produk
            $table->string('name');                
            $table->string('brand')->nullable();    
            $table->string('image')->nullable();   

            // Harga & promo
            $table->decimal('old_price', 15, 2)->nullable(); 
            $table->decimal('price', 15, 2);               
            $table->integer('discount')->nullable();  // ubah ke integer biar bisa hitung diskon

            // Stok & spesifikasi
            $table->enum('stock', ['tersedia', 'habis'])->default('tersedia');
            $table->text('specs')->nullable();              

            // Kategori utama
            $table->enum('category', ['laptop', 'pc', 'hp', 'accessories']);

            // Level (flagship, high range, mid range, entry level)
            $table->enum('level', ['flagship', 'high range', 'mid range', 'entry level'])->nullable();

            // Section (untuk menentukan ditampilkan di mana: produk, rekomendasi, promo, latest)
            $table->enum('section', ['product', 'recommendation', 'promo', 'latest'])
                  ->default('product');

            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
