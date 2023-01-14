<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            academic_year_seeder::class,
            grade_seeder::class,
            section_seeder::class,
            teacher_seeder::class,
            subject_seeder::class,
            student_seeder::class,
            day_seeder::class,
            period_seeder::class,
            user_seeder::class,
        ]);
    }
}
