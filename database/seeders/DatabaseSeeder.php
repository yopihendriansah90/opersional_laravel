<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

// use App\Models\Admin;

use App\Models\DriverKendaraan;
use App\Models\JenisKendaraan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            AdminSeeder::class,
            JenisKendaraanSeeder::class,
            KendaraanSeeder::class,
            DriverSeeder::class,
            DriverKendaraanSeeder::class,

        ]);
    }
}
