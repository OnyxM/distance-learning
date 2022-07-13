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

        \DB::insert("INSERT INTO teachers (id, title, name, poste, user_id, created_at, updated_at) VALUES
(1, 'Ing', 'Leonel MOYOU', 'Teacher', 4, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(2, 'Dr', 'Alidou AMINOU', 'Teacher', 5, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(3, 'Ing', 'Corneille TCHIO', 'Teacher', 6, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(4, 'Dr', 'Thomas MESSI', 'Teacher', 7, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(5, 'Dr', 'Mike TAPAMO', 'Teacher', 8, '2022-07-13 21:09:50', '2022-07-13 21:09:50'),
(6, 'Dr', 'Xaveira Kimbi', 'Poste', 9, '2022-07-13 21:15:29', '2022-07-13 21:15:29'),
(7, 'Dr', 'Valéry Monthe', 'Lecturer', 10, '2022-07-13 21:17:38', '2022-07-13 21:17:38'),
(8, 'Ing', 'Njine Chuangueu', 'Lecturer', 11, '2022-07-13 21:19:41', '2022-07-13 21:19:41');");

//        $teachers =[
//            [
//                'title' => "Ing",
//                'name' => "Leonel MOYOU",
//                'poste' => "Teacher",
//                'user_id' => "4",
//            ],
//            [
//                'title' => "Dr",
//                'name' => "Alidou AMINOU",
//                'poste' => "Teacher",
//                'user_id' => "5",
//            ],
//            [
//                'title' => "Ing",
//                'name' => "Corneille TCHIO",
//                'poste' => "Teacher",
//                'user_id' => "6",
//            ],
//            [
//                'title' => "Dr",
//                'name' => "Thomas MESSI",
//                'poste' => "Teacher",
//                'user_id' => "7",
//            ],
//            [
//                'title' => "Dr",
//                'name' => "Mike TAPAMO",
//                'poste' => "Teacher",
//                'user_id' => "8",
//            ]
//        ];
//
//        foreach ($teachers as $teacher) {
//            Teacher::create($teacher);
//        }
    }
}
