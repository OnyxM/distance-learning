<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UeController;
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

Route::group(['prefix'=>"course"], function(){
    Route::get('/v/{id}-{slug_course}', [CourseController::class, "course_details"])->name("course.enroll");
    Route::post('/r/{id}-{slug_course}', [CourseController::class, "submit_review"])->name("course.submit_review");
    Route::get('/v/{id}-{slug_course}/{module}/introduction', [CourseController::class, "course_details_introduction"])->name("course.details.module.intro");
    Route::get('/v/{id}-{slug_course}/{module}/{worksheet}', [CourseController::class, "course_details_worksheet"])
        ->name("course.details.module.worksheet")
        ->where([
            'worksheet' => "td|tp"
        ]);
//Route::get('/{id}-{slug_course}/{module}/tp', [CourseController::class, "course_details_worksheet"])->name("course.details.module.tp");
    Route::get('/{id}-{slug_course}/{module}/{section}', [CourseController::class, "course_details_section"])->name("course.details.module.section");
});


Route::post('register-to-class', [LevelController::class, "registerToClass"])->name('field.attend');

Route::group(['prefix'=>"my-classes"], function(){
    Route::get('', [ClassController::class, "index"])->name('class.index');
    Route::get('/follow_course/{ue}/{chapter?}', [CourseController::class, "follow_course"])->name('class.follow_course');
    Route::get('/follow_course/{ue}/{chapter?}/{resource}', [CourseController::class, "follow_course_resource"])->name('class.follow_course.resource');
});

Route::get('/lives', [HomeController::class, "lives"])->name("lives");
Route::get('live/{live_code}',  [LiveController::class, 'live'])->name("user.lives.assist");
Route::post('ue/post-comment', [UeController::class, "comment"])->name("ue.post_comment");

Route::post('init-payment', [TransactionController::class, "initPayment"])->name("init-payment");
Route::post('check-payment', [TransactionController::class, "checkPayment"])->name("check-payment");
