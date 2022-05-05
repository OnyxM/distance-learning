<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'users' => User::withTrashed()->get(),
        ];

        return view("admin.users", $data);
    }
}
