<?php

namespace App\Imports;

use App\Models\Level;
use App\Models\Ue;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UesImport implements ToModel, WithHeadingRow
{
    public function __construct(Level $level)
    {
        $this->level = $level;
    }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if(in_array($row['semester'], [1,2])){ // Si le num du semestre n'est pas bon on passe
            return new Ue([
                'name' => $row['name'],
                'slug' => Str::slug($row['name']),
                'code' => $row['code'],
                'description' => $row['description'],
                'requirements' => $row['requirements'],
                'syllabus' => $row['syllabus'],
                'semester_id' => $this->level->semesters[$row['semester']-1]->id,
            ]);
        }
    }
}
