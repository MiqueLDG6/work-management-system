<?php

// database/seeders/IncidentHistorySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidentHistorySeeder extends Seeder
{
    public function run(): void
    {


        DB::table('incident_history')->insert([
            [
                'incident_id' => 1,
                'changed_by' => 2,
                'field_changed' => 'status',
                'old_value' => 'open',
                'new_value' => 'in_progress',
            ],
            [
                'incident_id' => 2,
                'changed_by' => 2,
                'field_changed' => 'assigned_to',
                'old_value' => null,
                'new_value' => '2',
            ],
        ]);
    }
}
