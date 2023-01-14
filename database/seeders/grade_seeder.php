<?php

namespace Database\Seeders;
use App\Models\Grade;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class grade_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grade = new Grade;
        $grade->name = 'Grade-10';
        $grade->save();

        $grade = new Grade;
        $grade->name = 'Grade-11';
        $grade->save();

        $grade = new Grade;
        $grade->name = 'Grade-12';
        $grade->save();
    }
}
