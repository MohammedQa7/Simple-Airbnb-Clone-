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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('place_id');
            $table->text('reservation_start_date');
            $table->text('reservation_end_date');
            $table->float('total_price');
            $table->integer('total_guests');
            $table->integer('total_infants');
            $table->foreign('user_id')->references('id')->on('users')->onDeleted('cascade');
            $table->foreign('place_id')->references('id')->on('places')->onDeleted('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
