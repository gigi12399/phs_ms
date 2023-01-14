<?php

namespace Database\Seeders;
use App\Models\Teacher;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class teacher_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teacher = new Teacher;
        $teacher->name = 'Amelia';
        $teacher->profile = 'team-2.jpg';
        $teacher->gender = 0;
        $teacher->birthday = '1997-06-18';
        $teacher->degree = 'B.C.Sc';
        $teacher->nrc = '12/‌bhl(N)/234565';
        $teacher->phone = '09876554';
        $teacher->address = 'no(341),Ahlon Township,Yangon';
        $teacher->email = 'amelia@gmail.com';
        $teacher->salary = 500000;
        $teacher->description = 'This is tchel Amelia description.';
        $teacher->save();
        $teacher->grades()->attach([1,2]);

        $teacher = new Teacher;
        $teacher->name = 'Bo Bo';
        $teacher->profile = 'team-1.jpg';
        $teacher->gender = 1;
        $teacher->birthday = '1994-02-23';
        $teacher->degree = 'B.C.Sc';
        $teacher->nrc = '12/jjj(N)/234565';
        $teacher->phone = '123666666';
        $teacher->address = 'No.3, East Dagon , Yangon';
        $teacher->email = 'abobo@gmail.com';
        $teacher->salary = 600000;
        $teacher->description = 'This is tchel Bo Bo description.';
        $teacher->save();
        $teacher->grades()->attach([1]);

        $teacher = new Teacher;
        $teacher->name = 'Cherry';
        $teacher->profile = 'team-4.jpg';
        $teacher->gender = 0;
        $teacher->birthday = '1998-12-28';
        $teacher->degree = 'B.C.Sc';
        $teacher->nrc = '12/‌lll(N)/234565';
        $teacher->phone = '444555555';
        $teacher->address = 'NO.66,Wundwin Township, Mandalay';
        $teacher->email = 'cherry@gmail.com';
        $teacher->salary = 700000;
        $teacher->description = 'This is tchel Cherry description.';
        $teacher->save();
        $teacher->grades()->attach([2]);

        $teacher = new Teacher;
        $teacher->name = 'David';
        $teacher->profile = 'team-3.jpg';
        $teacher->gender = 1;
        $teacher->birthday = '1992-09-02';
        $teacher->degree = 'B.C.Sc';
        $teacher->nrc = '12/‌ahl(N)/234564';
        $teacher->phone = '666674678';
        $teacher->address = 'no(341), Pazuntaung Township, Yangon';
        $teacher->email = 'david@gmail.com';
        $teacher->salary = 400000;
        $teacher->description = 'This is tchel David description.';
        $teacher->save();
        $teacher->grades()->attach([1,3]);

        $teacher = new Teacher;
        $teacher->name = 'Ethan';
        $teacher->profile = 'team-5.jpg';
        $teacher->gender = 1;
        $teacher->birthday = '1980-07-12';
        $teacher->degree = 'B.C.Sc';
        $teacher->nrc = '12/‌lkl(N)/234565';
        $teacher->phone = '123543768';
        $teacher->address = 'No. 4, Thaketa, Yangon';
        $teacher->email = 'ethan@gmail.com';
        $teacher->salary = 600000;
        $teacher->description = 'This is tchel Ethan description.';
        $teacher->save();
        $teacher->grades()->attach([1]);
    }
}
