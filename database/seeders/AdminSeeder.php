<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'Super Admin',
            'username' => 'superadmin',
            'password' => bcrypt('password'),
            'roles' => 'superadmin'
        ]);

        Admin::create([
            'nama' => ' Admin',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'roles' => 'admin'
        ]);

        Admin::create([
            'nama' => ' Operasional',
            'username' => 'operasional',
            'password' => bcrypt('password'),
            'roles' => 'operasional'
        ]);


        Admin::create([
            'nama' => ' Mekanik',
            'username' => 'mekanik',
            'password' => bcrypt('password'),
            'roles' => 'mekanik'
        ]);

        Admin::create([
            'nama' => ' Driver',
            'username' => 'driver',
            'password' => bcrypt('password'),
            'roles' => 'driver'
        ]);
    }
}
