<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, "index"])->name("index");
Route::get('/courses', [HomeController::class, 'courses'])->name("courses");
Route::post('/courses', [HomeController::class, 'filterCourses'])->name("courses.filter");
Route::get('/course/{id}-{slug_course}', [HomeController::class, "course_details"])->name("course.details")->middleware(['user']);
Route::get('/about', [HomeController::class, "about"])->name("about");
Route::get('/lives', [HomeController::class, "lives"])->name("lives");
Route::get('/beta-test/{live_id}', [HomeController::class, "test"])->name("beta-test");
Route::get('/beta-test-disconnect/{live_id}', [HomeController::class, "disconnectUserFromLive"])->name("beta-test-disconnect");

Auth::routes();
