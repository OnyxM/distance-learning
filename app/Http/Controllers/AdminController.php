<?php

namespace App\Http\Controllers;

use App\Models\Ue;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data = [
            'title' => "Admin Dashboard - ",
            'users' => User::all(),
            'courses' => Ue::all(),
        ];

        return view("admin.index", $data);
    }
}
