<?php

// database/seeders/TimeTrackSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeTrackSeeder extends Seeder
{
    public function run(): void
    {


        DB::table('time_tracks')->insert([
            [
                'user_id' => 3,
                'date' => '2026-02-16',
                'clock_in' => '2026-02-16 09:00:00',
                'clock_out' => '2026-02-16 17:00:00',
                'notes' => 'Día normal',
            ],
            [
                'user_id' => 3,
                'date' => '2026-02-17',
                'clock_in' => '2026-02-17 09:30:00',
                'clock_out' => '2026-02-17 17:30:00',
                'notes' => 'Reunión incluida',
            ],
        ]);
    }
}

