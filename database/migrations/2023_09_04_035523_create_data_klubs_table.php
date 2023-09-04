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
        Schema::create('data_klubs', function (Blueprint $table) {
            $table->string('id_klub','150')->primary();
            $table->string('nama_klub','150')->unique();
            $table->string('kota_klub','150');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_klubs');
    }
};
