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
        Schema::table('plantours', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('discount');
            $table->date('date')->nullable()->change();
            $table->string( 'time')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plantours', function (Blueprint $table) {
            $table->decimal('price', 10, 2)->change();
            $table->decimal('discount', 10, 2)->change();
            $table->dropColumn('date');
            $table->dropColumn('time');
        });
    }
};
