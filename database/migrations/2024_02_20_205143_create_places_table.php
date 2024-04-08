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
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->text('slug');
            $table->text('description');
            $table->text('images');
            $table->float('price_per_night');
            $table->integer('guests_number');
            $table->integer('bedrooms_number');
            $table->integer('beds_number');
            $table->integer('bathrooms_number');
            $table->foreign('user_id')->references('id')->on('users')->onDeleted('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDeleted('cascade');
            $table->timestamps();
        });
    }
    // 'title',
    // 'description',
    // 'slug',
    // 'images', 
    // 'price_per_night', 
    // 'amenity_id', 
    // 'category_id', 
    // 'user_id',
    // 'guests_number',
    // 'bedrooms_number',
    // 'beds_number',
    // 'bathrooms_number', 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
