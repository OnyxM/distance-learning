<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Level;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FieldController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "All Fields - ",
            'fields' => Field::all()
        ];

        return view("admin.fields.index", $data);
    }

    public function new()
    {
        $data = [
            'title' => "Add a field - ",
        ];

        return view("admin.fields.new", $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => "required",
//            'description' => "required",
        ]);

        $new_field = Field::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        // On va directement créer les 5 niveaux de base ... et les 2 semestres de chaque niveau heun
        for($i = 1; $i<4; $i++){
            $lev = Level::create([
                'name' => "Level $i",
                'slug' => "L$i",
                'description' => "Level $i of ". $new_field->name,
                'pension' => 50000,
                'field_id' => $new_field->id
            ]);

            for($t=1; $t<3; $t++){
                Semester::create([
                    'name' => "Semester $t",
                    'slug' => "semester-$t",
                    'level_id' => $lev->id
                ]);
            }
        }
        for($i = 1; $i<3; $i++){
            $lev = Level::create([
                'name' => "Master Degree $i",
                'slug' => "M1",
                'description' => "Masters Degree $i of ". $new_field->name,
                'pension' => 50000,
                'field_id' => $new_field->id
            ]);

            for($t=1; $t<3; $t++){
                Semester::create([
                    'name' => "Semester $t",
                    'slug' => "semester-$t",
                    'level_id' => $lev->id
                ]);
            }
        }

        return redirect()->route('admin.fields');
    }

    public function delete($field_id)
    {
        $field = Field::find($field_id);

        if(! is_null($field)){
            $field->delete();
        }

        return redirect()->back();
    }

    public function details($field_id)
    {
        $field = Field::find($field_id);

        if(is_null($field)){
            return redirect()->route('admin.fields');
        }

        $data = [
            'title' => $field->name. " - System - ",
            'field' => $field
        ];

        return view("admin.levels.index", $data);

    }

    public function list()
    {
        $data = [
            'title' => "Our Fields - ",
            'fields' => Field::all(),
        ];

        return view("fields", $data);
    }

    public function field_infos($field)
    {
        $field = Field::whereSlug($field)->first();

        if(is_null($field)){
            abort(404);
        }

        $data = [
            'title' => "$field->name - ",
            'field' => $field
        ];

        return view("field_infos", $data);
    }
}
