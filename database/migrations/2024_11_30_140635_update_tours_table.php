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
        Schema::table('tours', function (Blueprint $table) {
            $table->string('max_member')->nullable()->change();
            $table->date('date')->nullable()->change();
            $table->time('time')->nullable()->change();
            $table->boolean('one_day')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tours', function (Blueprint $table) {
            $table->string('max_member')->nullable()->change();
            $table->date('date')->nullable()->change();
            $table->time('time')->nullable()->change();
        });
    }
};
