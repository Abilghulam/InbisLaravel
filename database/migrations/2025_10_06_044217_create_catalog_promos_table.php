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
        Schema::create('catalog_promos', function (Blueprint $table) {
            $table->id();

            // Opsional: Jika ingin tetap punya category, tapi nullable agar bisa global
            $table->enum('category', ['hp', 'laptop', 'pc', 'accessories'])
                  ->nullable()
                  ->comment('Boleh null jika judul promo bersifat global');

            // Judul utama promo
            $table->string('title');

            // Subjudul opsional
            $table->string('subtitle')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalog_promos');
    }
};
