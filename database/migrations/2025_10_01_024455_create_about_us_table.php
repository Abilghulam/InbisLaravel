<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->string('video_url')->nullable();
            $table->decimal('rating', 3, 1)->default(0); 
            $table->integer('reviews_count')->default(0); 
            $table->integer('years_experience')->default(0);
            $table->integer('brand_partners')->default(0);
            $table->integer('retail_stores')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
