<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Level;
use App\Models\Semester;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LevelController extends Controller
{
    public function index($field_slug)
    {
        $field = Field::whereSlug($field_slug)->first();

        if(is_null($field)){
            return redirect()->route('admin.fields');
        }

        $data = [
            'title' => "All Levels - ",
            'field' => $field,
            'levels' => $field->levels
        ];

        return view("admin.levels.index", $data);
    }

    public function new($field_slug)
    {
        $field = Field::whereSlug($field_slug)->first();

        if(is_null($field)){
            return redirect()->route('admin.fields');
        }

        $data = [
            'title' => "Add a field - ",
            'field' => $field
        ];

        return view("admin.levels.new", $data);
    }

    public function create(Request $request)
    {
        $field = Field::find($request->field);

        if(is_null($field)){
            return redirect()->route('admin.fields');
        }

        $this->validate($request, [
            'field' => "required",
            'name' => "required",
//            'description' => "required",
            'pension' => "required",
        ]);

        $new_level = Level::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'pension' => $request->pension,
            'field_id' => $field->id
        ]);

        Semester::create([
            'name' => "Semester 1",
            'slug' => "semester-1",
            'level_id' => $new_level->id
        ]); Semester::create([
            'name' => "Semester 2",
            'slug' => "semester-2",
            'level_id' => $new_level->id
        ]);

        return redirect()->route('admin.levels', ['field_slug' => $field->slug]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'field' => "required",
            'level' => "required",
            'name' => "required",
//            'description' => "required",
            'pension' => "required",
        ]);

        $field = Field::find($request->field);
        if(is_null($field)){
            return redirect()->route('admin.fields');
        }

        $level = Level::find($request->level);

        $level->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'pension' => $request->pension,
        ]); $level->save();

        return redirect()->back();

    }

    public function delete($field_slug, $level_id)
    {
        $level = Level::find($level_id);

        if(! is_null($level)){
            $level->delete();
        }

        return redirect()->back();
    }

    public function details($field_slug, $level_slug)
    {
        $field = Field::whereSlug($field_slug)->first();
        if(! is_null($field)){
            return redirect()->route('admin.fields');
        }

        $level = Field::whereSlug($level_slug)->first();
        if(! is_null($level)){
            return redirect()->route('admin.levels', ['field_slug' => $field_slug]);
        }

        die;

        $data = [
            'title' => $field->name. " - System - ",
            'field' => $field,
            'level' => $level,
        ];

        return view("admin.levels.index", $data);

    }

    public function level_infos($field, $level)
    {
        $field = Field::whereSlug($field)->first();
        if(is_null($field)){
            abort(404);
        }

        $level = $field->levels()->whereSlug($level)->first();
        if(is_null($level)){
            abort(404);
        }

        $data = [
            'title' => "$level->name of $field->name - ",
            'field' => $field,
            'level' => $level,
        ];

        return view("level_infos", $data);
    }

//    public function registerToClass(Request $request)
//    {
//        $this->validate($request, [
//            'field' => "required",
//            'level' => "required",
//        ]);
//
//        $field = Field::whereSlug($request->field)->first();
//        if(is_null($field)){
//            abort(404);
//        }
//
//        $level = $field->levels()->whereSlug($request->level)->first();
//        if(is_null($level)){
//            abort(404);
//        }
//
//        $user_id = auth()->user()->id;
//
//        if(!in_array($user_id, $level->participants()->pluck('user_id')->toArray())){
//            $level->participants()->attach($user_id, ['registration_date' => time()]);
//        }
//
//        // return redirect()->route('class.index');
//
//        return redirect()->back();
//    }
}
