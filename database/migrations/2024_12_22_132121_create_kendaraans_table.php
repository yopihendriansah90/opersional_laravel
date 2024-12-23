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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pintu')->nullable();
            $table->bigInteger('id_jenis_kendaraan')->unsigned();
            $table->string('no_polisi');
            $table->string('warna_kendaraan');
            $table->string('warna_tnbk');
            $table->string('no_rangka');
            $table->string('no_mesin');
            $table->integer('isi_silinder');
            $table->foreign('id_jenis_kendaraan')->references('id')->on('jenis_kendaraans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
