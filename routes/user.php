<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [UserController::class, "index"])->name("user.index");
Route::get('/course/v/{id}-{slug_course}', [CourseController::class, "course_details"])->name("course.enroll");
Route::get('/course/v/{id}-{slug_course}/{module}/introduction', [CourseController::class, "course_details_introduction"])->name("course.details.module.intro");
Route::get('/course/v/{id}-{slug_course}/{module}/{worksheet}', [CourseController::class, "course_details_worksheet"])
    ->name("course.details.module.worksheet")
    ->where([
        'worksheet' => "td|tp"
    ]);
//Route::get('/course/{id}-{slug_course}/{module}/tp', [CourseController::class, "course_details_worksheet"])->name("course.details.module.tp");
Route::get('/course/{id}-{slug_course}/{module}/{section}', [CourseController::class, "course_details_section"])->name("course.details.module.section");
