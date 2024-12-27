<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Kendaraan::create([
            'no_pintu' => '11101',
            'id_jenis_kendaraan' => 1,
            'no_polisi' => 'B 9285 WIN',
            'warna_kendaraan' => 'Merah',
            'warna_tnbk' => 'Merah',
            'no_rangka' => 'SDFDSFXXX',
            'no_mesin' => 'SDFDSFXXX',
            'isi_silinder' => 120,
            'status' => 'on',
        ]);
        Kendaraan::create([
            'no_pintu' => '11102',
            'id_jenis_kendaraan' => 2,
            'no_polisi' => 'B 9286 WIN',
            'warna_kendaraan' => 'Merah',
            'warna_tnbk' => 'Merah',
            'no_rangka' => 'SDFDSFXXX',
            'no_mesin' => 'SDFDSFXXX',
            'isi_silinder' => 120,
            'status' => 'on',
        ]);
    }
}
