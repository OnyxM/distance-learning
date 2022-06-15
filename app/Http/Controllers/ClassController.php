<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $data= [
            'title' => ""
        ];

        return view("user.index", $data);
    }
}
