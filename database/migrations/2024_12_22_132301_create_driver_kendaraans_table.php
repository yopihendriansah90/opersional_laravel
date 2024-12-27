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
        Schema::create('driver_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kendaraan')->nullable()->unsigned();
            $table->bigInteger('id_driver')->unsigned();
            $table->enum('tipe_driver', ['tetap', 'cadangan']);
            $table->foreign('id_kendaraan')->references('id')->on('kendaraans');
            $table->foreign('id_driver')->references('id')->on('drivers');
            $table->enum('status', ['on', 'off'])->default('on');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('driver_kendaraans');
    }
};
