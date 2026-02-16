<?php
// database/seeders/RoleSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiar tabla antes de insertar


        DB::table('roles')->insert([
            ['name' => 'admin', 'description' => 'Administrador del sistema'],
            ['name' => 'supervisor', 'description' => 'Supervisor de módulos'],
            ['name' => 'worker', 'description' => 'Empleado/usuario final'],
        ]);
    }
}
