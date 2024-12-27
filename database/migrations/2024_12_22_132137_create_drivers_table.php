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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned();
            $table->string('nama');
            $table->string('no_ktp')->unique();
            $table->string('foto_ktp');
            $table->string('no_hp')->unique();
            $table->text('alamat');
            $table->enum('status', ['on', 'off'])->default('on');
            $table->string('email')->unique();

            $table->foreign('id_user')->references('id')->on('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
