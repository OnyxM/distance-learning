<?php

namespace App\Http\Controllers;

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
            'title' => "",
        ];

        return view("courses", $data);
    }

    public function about(){
        $data = [
            'title' => "",
        ];

        return view("about", $data);
    }
}
