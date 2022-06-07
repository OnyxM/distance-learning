<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Level;
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
            'description' => "required",
            'pension' => "required",
        ]);

        Level::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'pension' => $request->pension,
            'field_id' => $field->id
        ]);

        return redirect()->route('admin.levels', ['field_slug' => $field->slug]);
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
}