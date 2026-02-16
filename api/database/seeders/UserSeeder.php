<?php

// database/seeders/UserSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {


        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 1
            ],
            [
                'name' => 'Supervisor User',
                'email' => 'supervisor@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 2
            ],
            [
                'name' => 'Worker User',
                'email' => 'worker@example.com',
                'password' => Hash::make('password123'),
                'role_id' => 3
            ],
        ]);
    }
}
