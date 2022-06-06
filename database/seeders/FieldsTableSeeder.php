<?php

namespace Database\Seeders;

use App\Models\Field;
use Illuminate\Database\Seeder;

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
        ];

        foreach ($fields as $field) {
            Field::create($field);
        }
    }
}
