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

    public function filterCourses(Request $request)
    {
//        dd($request->all());


        $filter_price = $request->filter_price;

        switch ($filter_price){
            case -1:
                $courses = Course::all();
                break;
            case 0:
                $courses = Course::wherePrice('0');
                break;
            case 1:
                $courses = Course::where('price', '<=', 25000);
                break;
            case 2:
                $courses = Course::where('price', '>', 25000);
                break;
        }

        if(!is_null($request->filter_name)){
            $filter_name = $request->filter_name;
            die;
            $courses = $courses->where("title", "like", "%$filter_name%");
        }

        if(isset($request->filter_category)){
            $filter_category = $request->filter_category;
            die('1');
            $courses = $courses->whereIn("category_id", $filter_category);
        }

        dd($courses->get());

        $data = [
            'title' => "Courses - ",
            'courses' => $courses,
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
