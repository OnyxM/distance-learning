<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', [TeacherController::class, "index"])->name("teacher.index");

Route::group(['prefix' => "course"], function(){
    Route::get('/', [CourseController::class, 'getAllUserCourses'])->name('course.index');
    Route::get('create', [CourseController::class, 'add'])->name('course.add');
    Route::post('create', [CourseController::class, 'create'])->name('course.create');
    Route::get('create/content/{uuid_course}', [CourseController::class, 'addContent'])->name('course.addContent');
    Route::post('create/content/{uuid_course}', [CourseController::class, 'createContent'])->name('course.createContent');

    Route::get('edit/{uuid_course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('edit/{uuid_course}', [CourseController::class, 'update'])->name('course.update');
    Route::get('edit/content/{uuid_course}', [CourseController::class, 'editContent'])->name('course.editContent');
    Route::post('edit/content/{uuid_course}', [CourseController::class, 'updateContent'])->name('course.updateContent');


    Route::post('delete', [CourseController::class, 'delete'])->name('course.delete');
});
