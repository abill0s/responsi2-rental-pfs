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
        Schema::table('cars', function (Blueprint $table) {
            $table->integer('seat')->nullable();
            $table->string('fuel')->nullable();
            $table->enum('transmission', ['Manual', 'Automatic'])->nullable();
            $table->integer('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cars', callback: function (Blueprint $table) {
            $table->dropColumn('seat');
            $table->dropColumn('fuel');
            $table->dropColumn('transmission');
            $table->dropColumn('price');
        });
    }
};
