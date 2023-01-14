<?php

namespace Database\Seeders;
use App\Models\Section;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class section_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section = new Section;
        $section->name = 'A';
        $section->grade_id = 1;
        $section->description = 'Girls';
        $section->save();

        $section = new Section;
        $section->name = 'B';
        $section->grade_id = 1;
        $section->description = 'Boys';
        $section->save();

        $section = new Section;
        $section->name = 'A';
        $section->grade_id = 2;
        $section->description = 'Girls';
        $section->save();

        $section = new Section;
        $section->name = 'B';
        $section->grade_id = 2;
        $section->description = 'Boys';
        $section->save();

        $section = new Section;
        $section->name = 'A';
        $section->grade_id = 3;
        $section->description = 'Girls';
        $section->save();

        $section = new Section;
        $section->name = 'B';
        $section->grade_id = 3;
        $section->description = 'Boys';
        $section->save();
        
    }
}
