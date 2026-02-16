<?php
// database/seeders/IncidentSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidentSeeder extends Seeder
{
    public function run(): void
    {


        DB::table('incidents')->insert([
            [
                'user_id' => 3,
                'assigned_to' => 2,
                'title' => 'Problema con acceso',
                'description' => 'No puedo acceder al sistema',
                'status' => 'open',
                'priority' => 'high',
            ],
            [
                'user_id' => 3,
                'assigned_to' => 2,
                'title' => 'Error en reporte de horas',
                'description' => 'Las horas no se calculan correctamente',
                'status' => 'in_progress',
                'priority' => 'medium',
            ],
        ]);
    }
}
