<?php

namespace App\Http\Controllers;

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
}
