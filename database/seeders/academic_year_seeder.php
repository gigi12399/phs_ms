<?php

namespace Database\Seeders;
use App\Models\AcademicYear;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class academic_year_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ay = new AcademicYear;
        $ay->year_one = 2022;
        $ay->year_two = 2023;
        $ay->save();

        $ay = new AcademicYear;
        $ay->year_one = 2023;
        $ay->year_two = 2024;
        $ay->save();
    }
}
