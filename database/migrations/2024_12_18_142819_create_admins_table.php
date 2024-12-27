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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('roles', ['superadmin', 'admin', 'operasional', 'driver', 'mekanik']);
<<<<<<< HEAD
            $table->enum('status', ['on', 'off'])->default('on');
=======
            $table->enum('status', ['on','off'])->default('on');
>>>>>>> 6130dc9f074a529ae86f67d20f80ebc3224b552c
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
