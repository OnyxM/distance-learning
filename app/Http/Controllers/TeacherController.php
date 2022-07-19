<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return redirect()->route("teacher.ues");
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
            'users' => User::where('priority', User::USER_PRIORITY['user'])->get(),
        ];

        return view("admin.teachers.new", $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => "required",
            // 'poste' => "required",
        ]);

        if($request->account == 1){
            $this->validate($request, [
                'user' => "required|exists:users,id",
            ]);

            $user = User::find($request->user);
            $user->priority = User::USER_PRIORITY['teacher'];
            $user->save();
        }else{
            $this->validate($request, [
                'firstname' => "required",
                'lastname' => "required",
                'email' => "required",
                'password' => "required",
            ]);

            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'priority' => User::USER_PRIORITY['teacher'],
            ]);
        }

        Teacher::create([
            'title' => $request->title,
            'name' => $user->name,
            // 'poste' => $request->poste,
            'user_id' => $user->id,
        ]);

        return redirect()->route('admin.teachers');
    }

    public function delete($id)
    {
        $teacher = Teacher::find($id);

        if(!is_null($teacher)){
            $teacher->delete();
        }

        return redirect()->back();
    }

    public function allTeachersJson(Request $request)
    {
        return response()->json([
            'teachers' => Teacher::orderBy('name', "asc")->get(),
        ]);
    }
}
