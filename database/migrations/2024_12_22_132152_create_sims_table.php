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
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_driver')->unsigned();
            $table->string('no_sim')->unique();
            $table->string('foto_sim');
            $table->string('jenis_sim');
            $table->date('masa_berlaku');

            $table->foreign('id_driver')->references('id')->on('drivers');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sims');
    }
};
