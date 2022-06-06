<?php

namespace App\Http\Controllers;

use App\Models\Field;
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

    public function new()
    {
        $data = [
            'title' => "Add a field - ",
        ];

        return view("admin.levels.new", $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => "required",
            'description' => "required",
        ]);

        Field::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);

        return redirect()->route('admin.levels');
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

        if(! is_null($field)){
            return redirect()->route('admin.levels');
        }

        $data = [
            'title' => $field->name. " - System - ",
            'field' => $field
        ];

        return view("admin.levels.index", $data);

    }
}
