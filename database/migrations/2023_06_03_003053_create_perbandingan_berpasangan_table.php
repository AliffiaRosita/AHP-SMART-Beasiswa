<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerbandinganBerpasanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perbandingan_berpasangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('riwayat_perhitungan_id')->constrained('riwayat_perhitungan')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kriteria1_id')->constrained('kriteria')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('kriteria2_id')->constrained('kriteria')->onUpdate('cascade')->onDelete('cascade');
            $table->double('nilai', 8, 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perbandingan_berpasangan');
    }
}
