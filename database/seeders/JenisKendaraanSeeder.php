<?php

namespace Database\Seeders;

use App\Models\JenisKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        JenisKendaraan::create([
            'nama' => 'Truck Mixer',
            'status' => 'on',
        ]);
        JenisKendaraan::create([
            'nama' => 'Dump Truck',
            'status' => 'on',
        ]);
    }
}
