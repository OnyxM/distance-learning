<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
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
}
