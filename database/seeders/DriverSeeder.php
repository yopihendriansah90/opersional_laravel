<?php

namespace Database\Seeders;

use App\Models\Driver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Driver::create([
            'id_user' => 1,
            'nama' => 'Doni',
            'no_ktp' => '3207311212980002',
            'foto_ktp' => 'Truck Mixer',
            'no_hp' => '083116546574',
            'alamat' => 'ini adalah alamat saya',
            'email' => 'doni@mail.com',
            'status' => 'on',
        ]);
        Driver::create([
            'id_user' => 2,
            'nama' => 'Yono',
            'no_ktp' => '3207311212980003',
            'foto_ktp' => 'Truck Mixer',
            'no_hp' => '083116546572',
            'alamat' => 'ini adalah alamat saya',
            'email' => 'yono@mail.com',
            'status' => 'on',
        ]);
    }
}
