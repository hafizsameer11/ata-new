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
        // Schema::create('bookings', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email');
        //     $table->string('phone');
        //     $table->string('adult');
        //     $table->string('young');
        //     $table->string('child');
        //     $table->string('orderno');
        //     $table->foreignId('user_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('tour_id')->constrained()->onDelete('cascade');
        //     $table->foreignId('plantour_id')->constrained()->onDelete('cascade');
        //     $table->decimal('total_price',10,2);
        //     $table->boolean('pay')->default(0);
        //     $table->string('pay_type')->default('pay_later');
        //     $table->boolean('user_status')->default(0);
        //     $table->boolean('status')->default(0);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
