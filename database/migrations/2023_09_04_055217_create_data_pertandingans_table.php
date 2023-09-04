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
        Schema::create('data_pertandingans', function (Blueprint $table) {
            $table->id();
            $table->string('klub_satu', '150');
            $table->string('klub_dua', '150');
            $table->bigInteger('skor_klub_satu');
            $table->bigInteger('skor_klub_dua');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pertandingans');
    }
};
