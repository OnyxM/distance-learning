<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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

    public function create(Request $request)
    {
        $this->validate($request, [
            'image' => "required",
            'title' => "required|min:10",
            'price' => "required",
            'description' => "required|min:200",
            'category' => "required|exists:categories,id",
        ]);

        $uuid = Str::uuid();

        // On upload l'image du cours et on l'ajoute aux autres éléments pour créer le cours ...
        $image_file= $request->image;
        $image_name = $image_file->getClientOriginalName();
        $image_file->move("uploads/courses/$uuid/", $image_name);


        // On crée le cours en question ...
        $new_course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category,
            'photo' => $image_name,
            'uuid' => $uuid,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route("course.addContent", ['uuid_course' => $uuid]);
    }

    public function addContent($uuid_course)
    {
        // On récupère le cours en fonction du uuid
        $course = Course::whereUuid($uuid_course)->first();

        if(is_null($course)){
            abort(404);
        }

        $data = [
            'title' => "Add Content to your course - ",
            'course' => $course
        ];

        return view("courses.create_content", $data);
    }

    public function createContent(Request $request, $uuid_course)
    {
        // On récupère le cours en fonction du uuid
        $course = Course::whereUuid($uuid_course)->first();

        if(is_null($course)){
            abort(404);
        }

        foreach ($request->part_title as $key => $title){
            $uuid_part = Str::uuid();

            // on va upload le contenu du cours
            $content_file = $request->part_content[$key];
            $content_name = $content_file->getClientOriginalName();
            $content_file->move("uploads/courses/".$course->uuid."/$uuid_part/", $content_name);

            Part::create([
                'title' => $request->part_title[$key],
                'slug' => Str::slug($request->part_title[$key]),
                'content' => $request->part_content[$key],
                'td' => $request->part_td[$key],
                'tp' => $request->part_tp[$key],
                'course_id' => $course->id,
                'part_uuid' => $uuid_part,
            ]);
        }

        return redirect()->route("course.index", ['slug_course' => Str::slug($course->id."-".$course->slug)]);
    }
}
