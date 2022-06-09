<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "",
        ];

        return view("teacher.index", $data);
    }

    public function indexAdmin()
    {
        $data = [
            'title' => "All Lecturers - ",
            'teachers' => Teacher::all(),
        ];

        return view("admin.teachers.index", $data);
    }

    public function new()
    {
        $data = [
            'title' => "Add a Lecturer - ",
            'users' => User::where('priority', '2')->whereNotIn('id', Teacher::pluck('user_id')->toArray())->get(),
        ];

        return view("admin.teachers.new", $data);
    }

    public function delete($id)
    {
        $teacher = Teacher::find($id);

        if(!is_null($teacher)){
            $teacher->delete();
        }

        return redirect()->back();
    }
}
