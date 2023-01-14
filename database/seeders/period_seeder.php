<?php

namespace Database\Seeders;
use App\Models\Period;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class period_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = array(['start' => '09:00:00', 'end' => '09:45:00'],
        ['start' => '09:45:00', 'end' => '10:30:00'],
        ['start' => '10:30:00', 'end' => '11:15:00'],
        ['start' => '11:15:00', 'end' => '12:00:00'],
        ['start' => '12:00:00', 'end' => '13:00:00'],
        ['start' => '13:00:00', 'end' => '13:45:00'],
        ['start' => '13:45:00', 'end' => '14:30:00'],
        ['start' => '14:30:00', 'end' => '15:15:00']);
        foreach ($periods as $row) {
            $period = new Period;
            $period->start_time = $row['start'];
            $period->end_time = $row['end'];
            $period->save();
        }
    }
}
