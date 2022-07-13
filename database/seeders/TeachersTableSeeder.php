<?php

namespace Database\Seeders;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeachersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $path = 'database/sql/teachers.sql';
//        DB::unprepared(file_get_contents($path));

        $teachers =[
            [
                'title' => "Ing",
                'name' => "Leonel MOYOU",
                'poste' => "Teacher",
                'user_id' => "4",
            ],
            [
                'title' => "Dr",
                'name' => "Alidou AMINOU",
                'poste' => "Teacher",
                'user_id' => "5",
            ],
            [
                'title' => "Ing",
                'name' => "Corneille TCHIO",
                'poste' => "Teacher",
                'user_id' => "6",
            ],
            [
                'title' => "Dr",
                'name' => "Thomas MESSI",
                'poste' => "Teacher",
                'user_id' => "7",
            ],
            [
                'title' => "Dr",
                'name' => "Mike TAPAMO",
                'poste' => "Teacher",
                'user_id' => "8",
            ]
        ];

        foreach ($teachers as $teacher) {
            Teacher::create($teacher);
        }
    }
}
