<?php

namespace Database\Seeders;

use App\Models\DriverKendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DriverKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DriverKendaraan::create([
            'id_kendaraan' => 1,
            'id_driver' => 1,
            'tipe_driver' => 'tetap',
            'status' => 'on',
        ]);
        DriverKendaraan::create([
            'id_kendaraan' => 2,
            'id_driver' => 2,
            'tipe_driver' => 'cadangan',
            'status' => 'on',
        ]);
    }
}
