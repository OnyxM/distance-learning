<?php

namespace Database\Seeders;

use App\Models\Field;
use App\Models\Level;
use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields =[
            [
                'name' => "ICT4D",
                'slug' => "ict4d",
                'description' => "Description de ICT4D ici ....",
            ],
            [
                'name' => "Physics",
                'slug' => "physics",
                'description' => "Description de Physics ici ....",
            ],
            [
                'name' => "Computer Sciences",
                'slug' => "info",
                'description' => "Description de Computer Sciences ici ....",
            ],
            [
                'name' => "Mathematics",
                'slug' => "maths",
                'description' => "Description de Mathematics ici ....",
            ],
            [
                'name' => "Chemistry",
                'slug' => "chemistry",
                'description' => "Description de Chemistry ici ....",
            ],
        ];

        foreach ($fields as $field) {
            $f = Field::create($field);

            for ($i = 1; $i<= 3; $i++){
                $l = Level::create([
                    'name' => "Level $i",
                    'slug' => "l$i",
                    'description' => "Level $i of $f->name",
                    'field_id' => $f->id,
                    'pension' => 50000
                ]);

                for ($p=1; $p<=2; $p++){
                    $sem = Semester::create([
                        'name' => "Semester $p",
                        'slug' => Str::slug("Semester $p"),
                        'level_id' => $l->id
                    ]);
                }
            }
        }


//        $paths = [
//            'database/sql/fields.sql',
//            'database/sql/levels.sql',
//            'database/sql/semesters.sql',
//        ];
//
//        foreach ($paths as $path) {
//            DB::unprepared(file_get_contents($path));
//        }
    }
}
