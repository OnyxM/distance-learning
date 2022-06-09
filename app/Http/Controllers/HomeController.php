<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Live;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [
            'title' => "",
            'recent_courses' => Course::orderBy('id', "desc")->limit(5)->get(),
        ];

        return view("index", $data);
    }

    public function courses(){
        $data = [
            'title' => "Courses - ",
            'courses' => Course::paginate(9),
            'categories' => Category::all(),
            'total_courses' => count(Course::all()),
            'filter_name' => "",
            'filter_cat' => [],
            'filter_price' => '-1',
        ];

        return view("courses", $data);
    }

    public function filterCourses(Request $request)
    {
        if(!is_null($request->filter_name)){
            $filter_name = $request->filter_name;
            $courses = Course::where("title", "like", "%$filter_name%");
        }

        $filter_price = $request->filter_price;
        switch ($filter_price){
            case 0:
                $courses = (isset($courses)) ? $courses->where('price', '0') : Course::wherePrice('0');
                break;
            case 1:
                $courses = (isset($courses)) ? $courses->where('price', '<=', 25000) : Course::where('price', '<=', 25000);
                break;
            case 2:
                $courses = (isset($courses)) ? $courses->where('price', '>', 25000)  : Course::where('price', '>', 25000);
                break;
        }

        if(isset($request->filter_category)){
            $filter_category = $request->filter_category;
            $courses = (isset($courses)) ? $courses->whereIn("category_id", $filter_category) : Course::whereIn("category_id", $filter_category);

        }

        $data = [
            'title' => "Courses - ",
            'total_courses' => isset($courses) ? count($courses->get()) : count(Course::all()),
            'courses' => (isset($courses)) ? $courses->paginate(9) : Course::paginate(9),
            'categories' => Category::all(),
            'filter_name' => $request->filter_name,
            'filter_cat' => $request->filter_category ?? [],
            'filter_price' => $request->filter_price,
        ];


        return view("courses", $data);
    }

    public function course_details($id, $slug_course)
    {
        $course = Course::where(['id' => $id,'slug' => $slug_course])->first();

        if(is_null($course)){
            abort(404);
        }

        $data = [
            'title' => $course->title." - ",
            'course' => $course
        ];

        return view("courses.overview", $data);
    }

    public function about(){
        $data = [
            'title' => "About us - ",
        ];

        return view("about", $data);
    }

    public function lives()
    {
        $data =[
            'title' => "Available Lives - ",
            'lives' => Live::orderBy('date_debut', 'desc')->get(),
        ];

        return view("lives", $data);
    }

    public function test($live_id)
    {
        $live = Live::where('uuid', $live_id)->first();

        $user = User::find(auth()->user()->id);

        if(is_null($live) || is_null($user)){
            return null;
        }

        $live->participants()->detach($user);

        $live->participants()->attach($user, [
            'date_adhésion' => time()
        ]);

        return[
            'user_id' => auth()->user()->id,
            'live_uuid' => $live_id
        ];
    }

    public static function disconnectUserFromLive($live_id)
    {
        $live = Live::where('uuid', $live_id)->first();

        $user = User::find(auth()->user()->id);

        if(is_null($live) || is_null($user)){
            return null;
        }

        $live->participants()->detach($user);

        return true;
    }
}
