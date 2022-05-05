<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, "index"])->name("admin.index");

Route::group(['prefix' => "users"], function(){
    Route::get('/', [UserController::class, "getAll"])->name("admin.users");
});
