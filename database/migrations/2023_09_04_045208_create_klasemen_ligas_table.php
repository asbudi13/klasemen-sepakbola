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
        Schema::create('klasemen_ligas', function (Blueprint $table) {
            $table->id();
            $table->string('id_klub', '150')->unique();
            $table->bigInteger('jumlah_main')->default(0);
            $table->bigInteger('jumlah_menang')->default(0);
            $table->bigInteger('jumlah_kalah')->default(0);
            $table->bigInteger('jumlah_seri')->default(0);
            $table->bigInteger('jumlah_gol')->default(0);
            $table->bigInteger('jumlah_kebobolan')->default(0);
            $table->bigInteger('jumlah_total_gol')->default(0);
            $table->bigInteger('jumlah_poin')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasemen_ligas');
    }
};
