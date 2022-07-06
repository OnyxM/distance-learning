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

        $path = 'database/sql/ues.sql';
        DB::unprepared(file_get_contents($path));
    }
}
