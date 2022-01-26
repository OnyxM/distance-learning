<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function add()
    {
        $data = [
            'title' => "Add Course - ",
            'categories' => Category::all()
        ];

        return view("courses.create", $data);
    }
}
