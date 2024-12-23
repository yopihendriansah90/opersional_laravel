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
        Schema::create('kirs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kendaraan')->unsigned();
            $table->string('no_uji_kir');
            $table->date('masa_berlaku');
            $table->foreign('id_kendaraan')->references('id')->on('kendaraans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kirs');
    }
};
