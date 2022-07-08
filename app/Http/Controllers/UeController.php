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
            abort(404);
        }
        $level = Level::whereSlug($level_slug)->first();
        if(is_null($level)){
            abort(404);
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
            'code' => "required|unique:ues,code",
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

    public function getAllTeacherCourses()
    {
        $data = [
            'title' => "My Courses - ",
            'ues' => auth()->user()->teacher->ues
        ];

        return view("teacher.ues.index", $data);
    }

    public function ueDetails($ue_code)
    {
        $ue = auth()->user()->teacher->ues()->where('code', $ue_code)->first();

        if(is_null($ue)){
            return redirect()->route('teacher.ues');
        }

        $data =[
            'title' => "$ue->name - ",
            'ue' => $ue
        ];

        return view("teacher.ues.details", $data);
    }

    public function editUe($ue_code)
    {
        $ue = auth()->user()->teacher->ues()->where('code', $ue_code)->first();

        if(is_null($ue)){
            return redirect()->route('teacher.ues');
        }

        $data =[
            'title' => "Edit UE - $ue->name - ",
            'ue' => $ue
        ];

        return view("teacher.ues.edit", $data);
    }

    public function updateUe(Request $request)
    {
        $this->validate($request, [
            'ue' => "required",
            'name' => "required",
            'code' => "required",
            'description' => "required"
        ]);

        $ue = auth()->user()->teacher->ues()->where('ues.id', $request->ue)->first();

        $ue->name = $request->name;
        $ue->slug = Str::slug($request->name);
        $ue->code = $request->code;
        $ue->description = $request->description;

        if(!is_null($request->photo)){
           // upload de la tof ...
            $image_file = $request->photo;
            $image_name = $image_file->getClientOriginalName();
            $image_file->move("assets/img/ues/", $image_name);

           $ue->photo = $image_name;
        }

        $ue->save();

        return redirect()->back();
//        return redirect()->route("teacher.ue.details", ['ue_code' => $ue->code]);
    }

    public function ue_infos($field, $level, $ue)
    {
        $field = Field::whereSlug($field)->first();
        if(is_null($field)){
            abort(404);
        }

        $level = $field->levels()->whereSlug($level)->first();
        if(is_null($level)){
            abort(404);
        }

        $ue = $level->ues()->where('ues.code', $ue)->first();
        if(is_null($ue)){
            abort(404);
        }

        $data = [
            'title' => "$ue->name | $level->name of $field->name - ",
            'field' => $field,
            'level' => $level,
            'ue' => $ue,
        ];

        return view("ue_infos", $data);

    }

    public function check(Request $request)
    {
        $ue = Ue::where('code', $request->ue)->first();

        $exists = true;

        if(is_null($ue)){
            $exists = false;
        }

        return response()->json([
            'status' => !$exists
        ]);
    }
}
