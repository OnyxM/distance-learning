<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title' => "",
        ];

        return view("index", $data);
    }

    public function courses(){
        $data = [
            'title' => "Courses - ",
            'courses' => Course::cursorPaginate(9),
            'categories' => Category::all(),
        ];

        return view("courses", $data);
    }

    public function about(){
        $data = [
            'title' => "About us - ",
        ];

        return view("about", $data);
    }
}
