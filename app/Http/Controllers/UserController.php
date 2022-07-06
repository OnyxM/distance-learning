<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
        $data= [
            'title' => ""
        ];

        return view("user.index", $data);
    }

    public function getAll()
    {
        $data = [
            'title' => "All Users - ",
            'users' => User::withTrashed()->where('priority', User::USER_PRIORITY['user'])->get(),
        ];

        return view("admin.users", $data);
    }

    public function setStatus(Request $request)
    {
        if(auth()->user()->priority !== User::USER_PRIORITY['admin']){
            auth()->logout();
            return redirect()->route('login');
        }

        $this->validate($request, [
            'user' => "required",
            'status' => "required",
            'reason' => "required",
        ]);

        $user = User::withTrashed()->where('id', $request->user)->first();

        if(!is_null($user)){
            if($request->status == "disable"){
                $user->delete();

                Log::info(auth()->user()->name . " restored the user's account with email : ".$user->email. "\nReason: " . $request->reason);
            }else{
                $user->restore();

                Log::info(auth()->user()->name . " suspended the user's account with email : ".$user->email);
            }
        }

        return redirect()->back();
    }
}
