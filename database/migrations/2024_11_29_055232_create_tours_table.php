<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
            // $table->decimal('price',10,2);
            // $table->decimal('discount',10,2);
            $table->string('duration');
            $table->string('max_member');
            $table->string('min_age');
            $table->string('tour_type');
            $table->string('include');
            $table->boolean('status')->default('0');
            $table->decimal('single_room', 10, 2);
            $table->decimal('twin_room', 10, 2);
            $table->decimal('child_room', 10, 2);
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->date('date');
            $table->time('time');
            // $table->boolean('deal')->default(0);
            // $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tours');
    }
};
