<?php

namespace Database\Seeders;
use App\Models\Subject;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class subject_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = array(['name' => 'Myanmar', 'teacher' => [1,3,2]],
                        ['name' => 'English', 'teacher' => [2]],
                        ['name' => 'Mathematics', 'teacher' => [3]],
                        ['name' => 'Chemistry', 'teacher' => [4]],
                        ['name' => 'Physics', 'teacher' => [5]],
                        ['name' => 'Biology', 'teacher' => [1]],
                        ['name' => 'Economy', 'teacher' => [2,5]],
                        ['name' => 'History', 'teacher' => [3]],
                        ['name' => 'Geography', 'teacher' => [4,1]]);
        foreach ($subjects as $row) {
            $subject = new Subject;
            $subject->name = $row['name'];
            $subject->save();
            $subject->teachers()->attach($row['teacher']);
        }
    }
}
