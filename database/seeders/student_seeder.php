<?php

namespace Database\Seeders;
use App\Models\Student;
use App\Models\StudentHistory;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class student_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function (){
        $student = new Student;
        $student->name = 'Felix';
        $student->nrc = '12/‌tkl(N)/234565';
        $student->email = 'felix@gmail.com';
        $student->gender = 1;
        $student->phone = '3335789432';
        $student->birthday = '1999-10-20';
        $student->address = 'no(341),Botahtaung Township,Yangon';
        $student->profile = 'pexels-kelvin-valerio-810775.jpg';
        // $student->section_id = 1;
        $student->info = 'This is Student Felix description.';
        $student->save();

        $student_history = new StudentHistory;
        $student_history->student_id = $student->id;
        $student_history->section_id = 2;
        $student_history->academic_year_id = 2;
        $student_history->status = 1;
        $student_history->save();
        });

        DB::transaction(function (){
        $student = new Student;
        $student->name = 'Grace';
        $student->nrc = '12/‌ahl(N)/234561';
        $student->email = 'grace@gmail.com';
        $student->gender = 0;
        $student->phone = '09876554';
        $student->birthday = '1995-03-30';
        $student->address = 'No.12, Nyaung-U Township , Mandalay';
        $student->profile = 'pexels-alexander-nerozya-8933433.jpg';
        // $student->section_id = 1;
        $student->info = 'This is Student Grace description.';
        $student->save();
        $student_history = new StudentHistory;
        $student_history->student_id = $student->id;
        $student_history->section_id = 1;
        $student_history->academic_year_id = 1;
        $student_history->status = 0;
        $student_history->save();
        });

        DB::transaction(function (){
        $student = new Student;
        $student->name = 'Henry';
        $student->nrc = '12/‌tkl(N)/234560';
        $student->email = 'henry@gmail.com';
        $student->gender = 1;
        $student->phone = '09876511';
        $student->birthday = '1989-12-13';
        $student->address = 'No.1, Yamethin Township, Mandalay';
        $student->profile = 'person_2.jpg';
        // $student->section_id = 2;
        $student->info = 'This is Student Henry description.';
        $student->save();
        $student_history = new StudentHistory;
        $student_history->student_id = $student->id;
        $student_history->section_id = 3;
        $student_history->academic_year_id = 2;
        $student_history->status = 1;
        $student_history->save();
        });

        DB::transaction(function (){
        $student = new Student;
        $student->name = 'Rin';
        $student->nrc = '12/‌tkl(N)/234160';
        $student->email = 'rin@gmail.com';
        $student->gender = 0;
        $student->phone = '09870511';
        $student->birthday = '1999-12-13';
        $student->address = 'No.1, Botahtaung Township, Mandalay';
        $student->profile = 'pexels-tuấn-kiệt-jr-1382731.jpg';
        // $student->section_id = 3;
        $student->info = 'This is Student Rin description.';
        $student->save();
        $student_history = new StudentHistory;
        $student_history->student_id = $student->id;
        $student_history->section_id = 6;
        $student_history->academic_year_id = 2;
        $student_history->status = 1;
        $student_history->save();
        });

    }
}
