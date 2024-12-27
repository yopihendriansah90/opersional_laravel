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
        Schema::create('stnks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kendaraan')->unsigned();
            $table->date('masa_berlaku');
            $table->date('masa_berlaku_plat');
            $table->float('pkb');
            $table->float('swdkllj');
            $table->float('biaya_admin_stnk');
            $table->float('biaya_admin_tnkb');
            $table->float('transport');
            $table->enum('status', ['on', 'off'])->default('on');

            $table->foreign('id_kendaraan')->references('id')->on('kendaraans');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stnks');
    }
};
