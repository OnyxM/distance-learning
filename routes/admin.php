<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    die('Admin dashboard');
})->name("admin.index");
