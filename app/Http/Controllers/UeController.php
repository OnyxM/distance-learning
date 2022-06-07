<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Models\Level;
use App\Models\Teacher;
use App\Models\Ue;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UeController extends Controller
{
    public function index($field_slug, $level_slug)
    {
        $field = Field::whereSlug($field_slug)->first();
        if(is_null($field)){
            return redirect()->route('admin.levels');
        }
        $level = Level::whereSlug($level_slug)->first();
        if(is_null($level)){
            return redirect()->route('admin.fields', ['field_slug' => $field_slug]);
        }

        $data = [
            'title' => "All UEs - ",
            'field' => $field,
            'level' => $level,
        ];

        return view("admin.ues.index", $data);
    }

    public function new($field_slug, $level_slug)
    {
        $field = Field::whereSlug($field_slug)->first();
        if(is_null($field)){
            return redirect()->route('admin.levels');
        }
        $level = Level::whereSlug($level_slug)->first();
        if(is_null($level)){
            return redirect()->route('admin.fields', ['field_slug' => $field_slug]);
        }

        $data = [
            'title' => "Add an ue - ",
            'field' => $field,
            'level' => $level,
            'teachers' => Teacher::all(),
        ];

        return view("admin.ues.new", $data);
    }

    public function create(Request $request)
    {
        $field = Field::find($request->field);
        if(is_null($field)){
            return redirect()->route('admin.fields');
        }
        $level = Level::find($request->level);
        if(is_null($level)){
            return redirect()->route('admin.levels', ['field_slug']);
        }

        $this->validate($request, [
            'name' => "required",
            'code' => "required",
        ]);

        $new_ue = Ue::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'code' => $request->code,
            'description' => $request->description,
            'semester_id' => $request->semester_id,
        ]);

        $new_ue->teachers()->attach($request->teacher);
        // $new_ue->teachers()->attach([1, 2]); // IDs des teachers

        return redirect()->route('admin.ues', ['field_slug' => $field->slug, 'level_slug' => $level->slug]);
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

        return view("admin.ues.index", $data);

    }
}
