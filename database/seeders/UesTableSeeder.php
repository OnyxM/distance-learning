<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Ue;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \DB::insert("INSERT INTO ues (id, name, code, slug, photo, description, requirements, syllabus, semester_id, created_at, updated_at) VALUES
//(1, 'Digital communication', 'ict316', 'digital-communication', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:13:03', '2022-07-13 21:13:03'),
//(2, 'Computer Forensics and Incident Response', 'ict314', 'computer-forensics-and-incident-response', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:13:23', '2022-07-13 21:13:23'),
//(3, 'Software Development in Java II', 'ict308', 'software-development-in-java-ii', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:13:54', '2022-07-13 21:13:54'),
//(4, 'Business Intelligence', 'ict306', 'business-intelligence', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:14:17', '2022-07-13 21:14:17'),
//(5, 'Software Testing and Deployment', 'ict304', 'software-testing-and-deployment', 'co-1.jpg', NULL, NULL, NULL, 6, '2022-07-13 21:15:43', '2022-07-13 21:15:43'),
//(6, 'Cyber and Internet Security', 'ict313', 'cyber-and-internet-security', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:16:36', '2022-07-13 21:16:36'),
//(7, 'Software Architectures and Design', 'ict301', 'software-architectures-and-design', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:18:08', '2022-07-13 21:18:08'),
//(8, 'Data Communication and Security', 'ict303', 'data-communication-and-security', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:18:33', '2022-07-13 21:18:33'),
//(9, 'Web Application Development', 'ict305', 'web-application-development', 'co-1.jpg', NULL, NULL, NULL, 5, '2022-07-13 21:20:26', '2022-07-13 21:20:26')");

//        \DB::insert("INSERT INTO teacher_ue (id, teacher_id, ue_id, created_at, updated_at) VALUES
//(1, 2, 1, NULL, NULL),
//(2, 1, 2, NULL, NULL),
//(3, 3, 3, NULL, NULL),
//(4, 5, 4, NULL, NULL),
//(5, 6, 5, NULL, NULL),
//(6, 1, 6, NULL, NULL),
//(7, 7, 7, NULL, NULL),
//(8, 2, 8, NULL, NULL),
//(9, 8, 9, NULL, NULL)");
//        $field = Field::find(1);
//
//        $ue = Ue::create([
//            'name' => "Internet and CyberSecurity",
//            'code' => "ict313",
//            'slug' => Str::slug("Internet and CyberSecurity"),
//            'description' => "Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla Lorem Ipsum dolor sit amet bla bla bla",
//            'semester_id' => $field->levels[2]->semesters[0]->id
//        ]);
//
//        $teacher = User::where('priority', User::USER_PRIORITY['teacher'])->first();
//
//        $ue->teachers()->attach($teacher->id);

//        $path = 'database/sql/ues.sql';
//        DB::unprepared(file_get_contents($path));
    }
}
