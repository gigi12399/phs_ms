<?php

namespace Database\Seeders;
use App\Models\Day;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class day_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        foreach ($days as $row) {
            $day = new Day;
            $day->name = $row;
            $day->save();
        }
    }
}
