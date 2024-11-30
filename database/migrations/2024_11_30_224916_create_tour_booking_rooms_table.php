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
        Schema::create('tour_booking_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('adultSingle')->nullable();
            $table->string('adultMultiple')->nullable();
            $table->string('child')->nullable();
            $table->unsignedBigInteger('tour_booking_id');
            $table->foreign('tour_booking_id')->references('id')->on('tour_bookings')->onDelete('cascade');
            // $table->string('infant')->nullable();

            $table->timestamps();
        });
        Schema::table('bookings', function (Blueprint $table) {
            $table->unsignedBigInteger('tour_booking_id');
            $table->foreign('tour_booking_id')->references('id')->on('tour_bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_booking_rooms');
    }
};
