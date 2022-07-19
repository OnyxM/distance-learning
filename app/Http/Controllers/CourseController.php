<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Ue;
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Part;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller
{

//    public function add()
//    {
//        $data = [
//            'title' => "Add Course - ",
//            'categories' => Category::orderBy('name', 'asc')->get(),
//        ];
//
//        return view("courses.create", $data);
//    }
//
//    public function create(Request $request)
//    {
//        $this->validate($request, [
//            'image' => "required",
//            'title' => "required|min:10",
//            'price' => "required",
//            'description' => "required|min:200",
//            'category' => "required|exists:categories,id",
//        ]);
//
//        $uuid = Str::uuid();
//
//        // On upload l'image du cours et on l'ajoute aux autres éléments pour créer le cours ...
//        $image_file= $request->image;
//        $image_name = $image_file->getClientOriginalName();
//        $image_file->move("uploads/courses/$uuid/", $image_name);
//
//
//        // On crée le cours en question ...
//        $new_course = Course::create([
//            'title' => $request->title,
//            'slug' => Str::slug($request->title),
//            'price' => $request->price,
//            'description' => $request->description,
//            'category_id' => $request->category,
//            'photo' => $image_name,
//            'uuid' => $uuid,
//            'user_id' => auth()->user()->id,
//        ]);
//
//        return redirect()->route("course.addContent", ['uuid_course' => $uuid]);
//    }
//
//    public function addContent($uuid_course)
//    {
//        // On récupère le cours en fonction du uuid
//        $course = Course::where(['uuid'=>$uuid_course, 'user_id'=>auth()->user()->id])->first();
//
//        if(is_null($course)){
//            abort(404);
//        }
//
//        $data = [
//            'title' => "Add Content to your course - ",
//            'course' => $course
//        ];
//
//        return view("courses.create_content", $data);
//    }
//
//    public function createContent(Request $request, $uuid_course)
//    {
//        // On récupère le cours en fonction du uuid
//        $course = Course::whereUuid($uuid_course)->first();
//
//        if(is_null($course)){
//            abort(404);
//        }
//
//        $nbre=1;
//        foreach ($request->module_title as $key => $module_title) {
//            $module_uuid = Str::uuid();
//
//            // Upload de la vid_intro
//            $intro_vid_file = $request->module_intro[$key];
//            $intro_video = $intro_vid_file->getClientOriginalName();
//            $intro_vid_file->move("uploads/courses/".$course->uuid."/$module_uuid/", $intro_video);
//
//            // Upload de la td_file
//            $td_file = $request->module_td[$key];
//            $td_name = $td_file->getClientOriginalName();
//            $td_file->move("uploads/courses/".$course->uuid."/$module_uuid/", $td_name);
//
//            // Upload de la tp_file
//            $tp_file = $request->module_tp[$key];
//            $tp_name = $tp_file->getClientOriginalName();
//            $tp_file->move("uploads/courses/".$course->uuid."/$module_uuid/", $tp_name);
//
//
//            $module = Module::create([
//                'name' => $module_title,
//                'slug' => Str::slug($module_title),
//                'intro' => $intro_video,
//                'td' => $td_name,
//                'tp' => $tp_name,
//                'uuid' => $module_uuid,
//                'course_id' => $course->id,
//            ]);
//
//            $module_sections_title ="module_".$nbre."_section_title";
//            $module_sections_content ="module_".$nbre."_section_content";
//
//            foreach ($request->$module_sections_title as $k => $module_section_title) {
//                Section::create([
//                    'title' => $module_section_title,
//                    'slug' => Str::slug($module_section_title),
//                    'content' => $request->$module_sections_content[$k],
//                    'uuid' => Str::uuid(),
//                    'module_id' => $module->id
//                ]);
//            }
//
//            $nbre++;
//        }
//
//        return redirect()->route("course.details", ['id' => $course->id, 'slug_course' => $course->slug]);
//    }
//
//    public function edit($uuid_course)
//    {
//        // On récupère le cours en fonction du uuid
//        $course = Course::where(['uuid'=>$uuid_course,'user_id' =>auth()->user()->id])->first();
//
//        if(is_null($course)){
//            abort(404);
//        }
//
//        $data = [
//            'title' => "Edit Course - ".$course->title. " - ",
//            'course' => $course,
//            'categories' => Category::all()
//        ];
//
//        return view('courses.edit', $data);
//    }
//
//    public function update(Request $request, $uuid_course)
//    {
//        // On récupère le cours en fonction du uuid
//        $course = Course::where(['uuid'=>$uuid_course,'user_id' =>auth()->user()->id])->first();
//
//        if(is_null($course)){
//            abort(404);
//        }
//
//        $this->validate($request, [
//            'title' => "required|min:10",
//            'price' => "required",
//            'description' => "required|min:200",
//            'category' => "required|exists:categories,id",
//        ]);
//
//        // Si il y'a l'image on val'uploader et update en bd aussi ...
//        if(!is_null($request->image)){
//            $image_file= $request->image;
//            $image_name = $image_file->getClientOriginalName();
//            $image_file->move("uploads/courses/".$course->uuid."/", $image_name);
//
//            $course->photo = $image_name; // update de la BD
//        }
//
//        $course->title = $request->title;
//        $course->slug = Str::slug($request->title);
//        $course->price = $request->price;
//        $course->description = $request->description;
//        $course->category_id = $request->category;
//
//        $course->save();
//
//        return redirect()->route('course.editContent', ['uuid_course' => $course->uuid]);
//    }
//
//    public function editContent ($uuid_course)
//    {
//        // On récupère le cours en fonction du uuid
//        $course = Course::where(['uuid'=>$uuid_course, 'user_id'=>auth()->user()->id]) ->first();
//
//        if(is_null($course)){
//            abort(404);
//        }
//
//        $data = [
//            'title' => "Edit Content - " . $course->title . " - ",
//            'course' => $course,
//            'modules' => $course->modules,
//        ];
//
//        return view("courses.edit_content", $data);
//    }
//
//    public function updateContent(Request $request, $uuid_course)
//    {
//        // On récupère le cours en fonction du uuid
//        $course = Course::where(['uuid'=>$uuid_course,'user_id' =>auth()->user()->id])->first();
//        if(is_null($course)){
//            abort(404);
//        }
//
//        // dd($request->all());
//        // Il manque plus que la suppression des éléments non modifiés (meaning ils n'existent pas dans le Request soumis)
//
//        /* On va parcourir les uuid des modules qui sont hidden.
//         * On commence par DELETE les modules qui n'ont pas été envoyées dans le formulaire
//         * Pour chacun restant, on s'assure qu'il est le uuid d'un module de ce cours et on update ses élts.
//         * On fait la même chose au sous-niveau pour les sections. */
//
//        $new_module_indices = 0;
//        $modules_to_update = array();
//        foreach ($request->module_title as $key => $title) {
//            $ind = $key+1; $m_uuid = "m_{$ind}_uuid"; @$module_uuid = $request->$m_uuid;
//            $module = $course->modules()->whereUuid($module_uuid)->first();
//
//            $modules_to_update[] = $module_uuid;
//
//            if(!is_null($module)){
//                $mod_uuid = $module->uuid;
//
//                $intro_file = "intro$ind"; $module_td = "module_td$ind"; $module_tp = "module_tp$ind";
//
//                if(!is_null($request->$intro_file)){
//                    // Upload de la vid_intro
//                    $intro_vid_file = $request->$intro_file;
//                    $intro_video = $intro_vid_file->getClientOriginalName();
//                    $intro_vid_file->move("uploads/courses/".$course->uuid."/$mod_uuid/", $intro_video);
//
//                    $module->update([
//                        'intro' => $intro_video
//                    ]); $module->save();
//
//                }
//                if(!is_null($request->$module_td)){
//                    $td_file = $request->$module_td;
//                    $td_name = $td_file->getClientOriginalName();
//                    $td_file->move("uploads/courses/".$course->uuid."/$mod_uuid/", $td_name);
//
//                    $module->update([
//                        'intro' => $td_name
//                    ]); $module->save();
//
//                }
//                if(!is_null($request->$module_tp)){
//                    $tp_file = $request->$module_tp;
//                    $tp_name = $tp_file->getClientOriginalName();
//                    $tp_file->move("uploads/courses/".$course->uuid."/$mod_uuid/", $tp_name);
//
//                    $module->update([
//                        'intro' => $tp_name
//                    ]); $module->save();
//
//                }
//                $module->update([
//                    'name' => $request->module_title[$key],
//                    'slug' => Str::slug($request->module_title[$key]),
//                ]); $module->save();
//
//                $mod_section_title = "module_{$ind}_section_title"; $mod_section_content = "module_{$ind}_section_content";
//                if(!is_null($request->$mod_section_title)){ // This is not suppose to happen but ....
//
//                    $sections_to_update = array();
//                    foreach ($request->$mod_section_title as $sec_key => $section_title) {
//                        $s_ind = $sec_key+1; $m_s_uuid = "m_{$ind}_s_{$s_ind}_uuid"; @$section_uuid = $request->$m_s_uuid;
//                        $section = $module->sections()->whereUuid($section_uuid)->first();
//                        $sections_to_update[] = $section_uuid;
//
//                        if(!is_null($section)){
//                            $section->update([
//                                'title' => $request->$mod_section_title[$sec_key],
//                                'slug' => Str::slug($request->$mod_section_title[$sec_key]),
//                                'content' => $request->$mod_section_content[$sec_key],
//                            ]); $section->save();
//                        }else{
//                            Section::create([
//                                'title' => $request->$mod_section_title[$sec_key],
//                                'slug' => Str::slug($request->$mod_section_title[$sec_key]),
//                                'content' => $request->$mod_section_content[$sec_key],
//                                'uuid' => Str::uuid(),
//                                'module_id' => $module->id
//                            ]);
//                        }
//                    }
//
//
//                    $fake_sections = $module->sections()->whereNotIn('uuid', $sections_to_update)->get();
//                    foreach ($fake_sections as $fake_section) {
//                        $fake_section->delete();
//                    }
//                }
//            }
//            else{
//                // die("Create this module and attach it to the course ...");
//
//                $nbre = $course->modules()->count() + 1;
//
//                $new_module_uuid = Str::uuid();
//
//                // Upload de la vid_intro
//                $intro_vid_file = $request->module_intro[$new_module_indices];
//                $intro_video = $intro_vid_file->getClientOriginalName();
//                $intro_vid_file->move("uploads/courses/".$course->uuid."/$new_module_uuid/", $intro_video);
//
//                // Upload de la td_file
//                $td_file = $request->module_td[$new_module_indices];
//                $td_name = $td_file->getClientOriginalName();
//                $td_file->move("uploads/courses/".$course->uuid."/$new_module_uuid/", $td_name);
//
//                // Upload de la tp_file
//                $tp_file = $request->module_tp[$new_module_indices];
//                $tp_name = $tp_file->getClientOriginalName();
//                $tp_file->move("uploads/courses/".$course->uuid."/$new_module_uuid/", $tp_name);
//
//
//                $new_module_created = Module::create([
//                    'name' => $request->module_title[$key],
//                    'slug' => Str::slug($request->module_title[$key]),
//                    'intro' => $intro_video,
//                    'td' => $td_name,
//                    'tp' => $tp_name,
//                    'uuid' => $new_module_uuid,
//                    'course_id' => $course->id,
//                ]);
//
//                $module_sections_title ="module_".$nbre."_section_title";
//                $module_sections_content ="module_".$nbre."_section_content";
//
//                foreach ($request->$module_sections_title as $k => $module_section_title) {
//                    Section::create([
//                        'title' => $module_section_title,
//                        'slug' => Str::slug($module_section_title),
//                        'content' => $request->$module_sections_content[$k],
//                        'uuid' => Str::uuid(),
//                        'module_id' => $new_module_created->id
//                    ]);
//                }
//
//                $nbre++; $new_module_indices++;
//            }
//        }
//
//        $fake_modules = $course->modules()->whereNotIn('uuid', $modules_to_update)->get();
//        foreach ($fake_modules as $fake_module) {
//            $fake_module->sections()->delete(); // suppression en cascade
//            $fake_module->delete();
//        }
//
//        return redirect()->route("course.details", ['id' => $course->id, 'slug_course' => $course->slug]);
//    }
//
//    public function delete(Request $request)
//    {
//        $this->validate($request, [
//            'course' => "required",
//        ]);
//        // On récupère le cours en fonction du uuid
//        $course = Course::where(['uuid'=>$request->course, 'user_id'=>auth()->user()->id]) ->first();
//
//        if(is_null($course)){
//            abort(404);
//        }
//
//        $course->delete();
//
//        return redirect()->route('course.index');
//    }
//
//    public function course_details($id, $slug)
//    {
//        $course = Course::where(['id' => $id, 'slug' => $slug])->first();
//
//        if(is_null($course)){
//            return redirect()->route('courses');
//        }
//
//        /**
//         * On va l'ajouter au cours si il n'y est pas déjà ...
//         *
//         * NB: Ceci sera fait dans une fonction séparée au moment d'intégrer le module de paiement.
//         */
//        $user_id = auth()->user()->id;
//
//        if(!in_array($user_id, $course->participants()->pluck('user_id')->toArray()) && $course->user->id != $user_id){
//            $course->participants()->attach($user_id, ['registration_date' => time(), 'playback_level' => json_encode(['m'=>0, 's'=>0])]);
//        }
//
//        $data = [
//            'title' => $course->title. " - ",
//            'course' => $course,
//            'type' => "",
//        ];
//
//        return view('courses.view', $data);
//    }
//
//    public function course_details_introduction($id, $slug, $module)
//    {
//        $course = Course::where(['id' => $id, 'slug' => $slug])->first();
//
//        if(is_null($course)){
//            return redirect()->route('courses');
//        }
//
//        $module = $course->modules()->where('slug', $module)->first();
//        if(is_null($module)){
//            abort(404);
//        }
//
//        // On va update le niveau_de_lecture
//        $course->participants()->where('user_id',auth()->user()->id)->update(['playback_level' => json_encode(['m'=>$module->uuid, 's'=>0])]);
//
//        $data = [
//            'title' => $course->title. " - ",
//            'course' => $course,
//            'module' => $module,
//            'type' => "intro",
//        ];
//
//        return view('courses.view', $data);
//    }
//
//    public function course_details_section($id, $slug, $module, $section)
//    {
//        $course = Course::where(['id' => $id, 'slug' => $slug])->first();
//
//        if(is_null($course)){
//            return redirect()->route('courses');
//        }
//
//        $module = $course->modules()->where('slug', $module)->first();
//        if(is_null($module)){
//            abort(404);
//        }
//
//        $section = $module->sections()->where('slug', $section)->first();
//        if(is_null($section)){
//            abort(404);
//        }
//
//        // On va update le niveau_de_lecture
//        $course->participants()->where('user_id',auth()->user()->id)->update(['playback_level' => json_encode(['m'=>$module->uuid, 's'=>$section->uuid])]);
//
//        $data = [
//            'title' => $course->title. " - ",
//            'course' => $course,
//            'module' => $module,
//            'section' => $section,
//            'type' => "section",
//        ];
//
//        return view('courses.view', $data);
//    }
//
//    public function course_details_worksheet($id, $slug, $module, $worksheet)
//    {
//        $course = Course::where(['id' => $id, 'slug' => $slug])->first();
//
//        if(is_null($course)){
//            return redirect()->route('courses');
//        }
//
//        $module = $course->modules()->where('slug', $module)->first();
//        if(is_null($module)){
//            abort(404);
//        }
//
//        // On va update le niveau_de_lecture
//        if($worksheet=="td"){
//            $sec = -1;
//        }else if($worksheet=="tp"){
//            $sec = -2;
//        }
//        $course->participants()->where('user_id',auth()->user()->id)->update(['playback_level' => json_encode(['m'=>$module->uuid, 's'=>$sec])]);
//
//        $data = [
//            'title' => $course->title. " - ",
//            'course' => $course,
//            'module' => $module,
//            'type' => $worksheet,
//        ];
//
//        return view('courses.view', $data);
//    }
//
//    public function submit_review(Request $request, $id, $slug_course)
//    {
//        $course = Course::where(['id' => $id,'slug' => $slug_course])->first();
//        $user = User::find(auth()->user()->id);
//        $course_user = $course->participants()->where('user_id',$user->id)->first();
//
//        if(is_null($course) || is_null($course_user)){
//            return abort(404);
//        }
//
//        $this->validate($request, [
//            'review' => "string:min:50",
//        ]);
//
//        $course->participants()->where('user_id',$user->id)->detach();
//
//        $course->participants()->attach($user->id,[
//            'registration_date' => $course_user->pivot->registration_date,
//            'playback_level' => $course_user->pivot->playback_level,
//            'comment' => $request->review
//        ]);
//
//        return redirect()->back();
//
//    }

    public function follow_course($code, $chapter=null)
    {
        // The UE does not exists
        $ue = Ue::whereCode($code)->first();
        if(is_null($ue)){
            abort(404);
        }

        // he has not paid for this level
        if(!in_array(auth()->user()->id, $ue->semester->level->participants()->pluck('user_id')->toArray())){
            // abort(404);
        }

        if(!is_null($chapter)){
            $chapter = $ue->chapters()->where('chapters.id', $chapter)->first();
        }else{
            $chapter = @$ue->chapters[0];
        }

        $data = [
            'title' => "$ue->name",
            'ue'=> $ue,
            'chapter'=> $chapter,
        ];

        return view('courses.view', $data);
    }
    public function follow_course_resource($code, $chapter, $resource)
    {
        // The UE does not exists
        $ue = Ue::whereCode($code)->first();
        if(is_null($ue)){
            abort(404);
        }

        // he has not paid for this level
        if(!in_array(auth()->user()->id, $ue->semester->level->participants()->pluck('user_id')->toArray())){
            // abort(404);
        }

        if(!is_null($chapter)){
            $chapter = $ue->chapters()->where('chapters.id', $chapter)->first();
        }else{
            $chapter = @$ue->chapters[0];
        }

        if(!in_array($resource, ['td', 'tp'])){
            abort(404);
        }

        if(is_null($chapter->$resource)){
            abort(404);
        }

        $data = [
            'title' => "$ue->name",
            'ue'=> $ue,
            'chapter'=> $chapter,
            'resource' => $resource,
        ];

        return view('courses.view', $data);
    }
}
