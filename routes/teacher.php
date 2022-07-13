<?php

use App\Http\Controllers\ChapterController;
use App\Http\Controllers\LiveController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', [TeacherController::class, "index"])->name("teacher.index");

Route::group(['prefix' => "ues"], function(){
    Route::get('/', [UeController::class, 'getAllTeacherCourses'])->name('teacher.ues');
    Route::get('/{ue_code}', [UeController::class, 'ueDetails'])->name('teacher.ue.details');
    Route::get('/edit/{ue_code}', [UeController::class, 'editUe'])->name('teacher.ue.edit');
    Route::post('/update-ue', [UeController::class, 'updateUe'])->name('teacher.ue.update_infos');

    Route::group(['prefix' => "chapter"], function(){
        Route::post("add", [ChapterController::class, "create"])->name('chapter.add');
        Route::post("delete", [ChapterController::class, "delete"])->name('chapter.delete');
    });

//    Route::get('create', [CourseController::class, 'add'])->name('course.add');
//    Route::post('create', [CourseController::class, 'create'])->name('course.create');
//    Route::get('create/content/{uuid_course}', [CourseController::class, 'addContent'])->name('course.addContent');
//    Route::post('create/content/{uuid_course}', [CourseController::class, 'createContent'])->name('course.createContent');
//
//    Route::get('edit/{uuid_course}', [CourseController::class, 'edit'])->name('course.edit');
//    Route::post('edit/{uuid_course}', [CourseController::class, 'update'])->name('course.update');
//    Route::get('edit/content/{uuid_course}', [CourseController::class, 'editContent'])->name('course.editContent');
//    Route::post('edit/content/{uuid_course}', [CourseController::class, 'updateContent'])->name('course.updateContent');
//
//
//    Route::post('delete', [CourseController::class, 'delete'])->name('course.delete');
});


Route::group(['prefix'=>"live"], function(){
    Route::get('',  [LiveController::class, 'getUserLives'])->name("user.lives");
//    Route::post('/nbre-users',  [LiveController::class, 'getNbreConectedUsers'])->name("user.lives.count_users");
    Route::post('/new',  [LiveController::class, 'create'])->name("user.lives.new");
    Route::post('/delete',  [LiveController::class, 'delete'])->name("user.lives.delete");
});
