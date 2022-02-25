<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Module;
use App\Models\Part;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function getAllUserCourses()
    {
        $data = [
            'title' => "My Courses - ",
            'courses' => auth()->user()->courses
        ];

        return view("teacher.list_courses", $data);
    }

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
        $course = Course::where(['uuid'=>$uuid_course, 'user_id'=>auth()->user()->id])->first();

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

        $nbre=1;
        foreach ($request->module_title as $key => $module_title) {
            $module_uuid = Str::uuid();

            // Upload de la vid_intro
            $intro_vid_file = $request->module_intro[$key];
            $intro_video = $intro_vid_file->getClientOriginalName();
            $intro_vid_file->move("uploads/courses/".$course->uuid."/module$nbre/", $intro_video);

            // Upload de la td_file
            $td_file = $request->module_td[$key];
            $td_name = $td_file->getClientOriginalName();
            $td_file->move("uploads/courses/".$course->uuid."/module$nbre/", $td_name);

            // Upload de la tp_file
            $tp_file = $request->module_tp[$key];
            $tp_name = $tp_file->getClientOriginalName();
            $tp_file->move("uploads/courses/".$course->uuid."/module$nbre/", $tp_name);


            $module = Module::create([
                'name' => $module_title,
                'slug' => Str::slug($module_title),
                'intro' => $intro_video,
                'td' => $td_name,
                'tp' => $tp_name,
                'uuid' => $module_uuid,
                'course_id' => $course->id,
            ]);

            $module_sections_title ="module_".$nbre."_section_title";
            $module_sections_content ="module_".$nbre."_section_content";

            foreach ($request->$module_sections_title as $k => $module_section_title) {
                Section::create([
                    'title' => $module_section_title,
                    'slug' => Str::slug($module_section_title),
                    'content' => $request->$module_sections_content[$k],
                    'uuid' => Str::uuid(),
                    'module_id' => $module->id
                ]);
            }

            $nbre++;
        }

        return redirect()->route("course.details", ['slug_course' => Str::slug($course->id."-".$course->slug)]);
    }

    public function edit($uuid_course)
    {
        // On récupère le cours en fonction du uuid
        $course = Course::where(['uuid'=>$uuid_course,'user_id' =>auth()->user()->id])->first();

        if(is_null($course)){
            abort(404);
        }

        $data = [
            'title' => "Edit Course - ".$course->title. " - ",
            'course' => $course,
            'categories' => Category::all()
        ];

        return view('courses.edit', $data);
    }

    public function update(Request $request, $uuid_course)
    {
        // On récupère le cours en fonction du uuid
        $course = Course::where(['uuid'=>$uuid_course,'user_id' =>auth()->user()->id])->first();

        if(is_null($course)){
            abort(404);
        }

        $this->validate($request, [
            'title' => "required|min:10",
            'price' => "required",
            'description' => "required|min:200",
            'category' => "required|exists:categories,id",
        ]);

        // Si il y'a l'image on val'uploader et update en bd aussi ...
        if(!is_null($request->image)){
            $image_file= $request->image;
            $image_name = $image_file->getClientOriginalName();
            $image_file->move("uploads/courses/".$course->uuid."/", $image_name);

            $course->photo = $image_name; // update de la BD
        }

        $course->title = $request->title;
        $course->slug = Str::slug($request->title);
        $course->description = $request->description;
        $course->category_id = $request->category;

        $course->save();

        return redirect()->route('course.editContent', ['uuid_course' => $course->uuid]);
    }

    public function editContent ($uuid_course)
    {
        // On récupère le cours en fonction du uuid
        $course = Course::where(['uuid'=>$uuid_course, 'user_id'=>auth()->user()->id]) ->first();

        if(is_null($course)){
            abort(404);
        }

        $data = [
            'title' => "Edit Content - " . $course->title . " - ",
            'course' => $course,
            'parts' => $course->parts,
        ];

        return view("courses.edit_content", $data);
    }

    public function updateContent(Request $request, $uuid_course)
    {
        // On récupère le cours en fonction du uuid
        $course = Course::where(['uuid'=>$uuid_course,'user_id' =>auth()->user()->id])->first();
        if(is_null($course)){
            abort(404);
        }

        // On commence par mettre ce côté les parties actuelles (on va les delete à la fin du process)
        $old_parts = $course->parts;

        // On ajoute le nouveau content
        foreach ($request->part_title as $key => $title){
            $uuid_part = Str::uuid();

            // on va upload le contenu du cours
            $content_file = $request->part_content[$key];
            $content_name = $content_file->getClientOriginalName();
            $content_file->move("uploads/courses/".$course->uuid."/$uuid_part/", $content_name);

            Part::create([
                'title' => $request->part_title[$key],
                'slug' => Str::slug($request->part_title[$key]),
                'content' => $content_name,
                'td' => $request->part_td[$key],
                'tp' => $request->part_tp[$key],
                'course_id' => $course->id,
                'part_uuid' => $uuid_part,
            ]);
        }


    }

    public function delete(Request $request)
    {
        $this->validate($request, [
            'course' => "required",
        ]);
        // On récupère le cours en fonction du uuid
        $course = Course::where(['uuid'=>$request->course, 'user_id'=>auth()->user()->id]) ->first();

        if(is_null($course)){
            abort(404);
        }

        $course->delete();

        return redirect()->route('course.index');
    }
}
