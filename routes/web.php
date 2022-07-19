<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UeController;
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

Route::get('/field', [FieldController::class, 'list'])->name("fields.list");
Route::get('/field/{field}', [FieldController::class, 'field_infos'])->name("fields.info");
Route::get('/field/{field}/{level}', [LevelController::class, 'level_infos'])->name("levels.info");
Route::get('/field/{field}/{level}/{ue}', [UeController::class, 'ue_infos'])->name("ue.info");

Route::get('/course/{id}-{slug_course}', [HomeController::class, "course_details"])->name("course.details")->middleware(['user']);
Route::get('/about', [HomeController::class, "about"])->name("about");

Route::post('/search', [HomeController::class, "filterUes"])->name("ues.search");




// visio-conférence
Route::get('/beta-test/{live_id}', [HomeController::class, "test"])->name("beta-test");
Route::get('/beta-test-disconnect/{live_id}', [HomeController::class, "disconnectUserFromLive"])->name("beta-test-disconnect");

Auth::routes();


Route::get('test/{id}', [\App\Http\Controllers\TransactionController::class, "test"]);
