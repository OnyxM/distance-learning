<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [AdminController::class, "index"])->name("admin.index");

Route::group(['prefix' => "users"], function(){
    Route::get('/', [UserController::class, "getAll"])->name("admin.users");
    Route::post('/set-status', [UserController::class, "setStatus"])->name("admin.users.set_status");
});

Route::group(['prefix' => "teachers"], function(){
    Route::get('/', [TeacherController::class, "indexAdmin"])->name("admin.teachers");
    Route::get('/new', [TeacherController::class, "new"])->name("admin.teachers.new");
    Route::post('/create', [TeacherController::class, "create"])->name("admin.teachers.create");
    Route::get('/delete/{id}', [TeacherController::class, "delete"])->name("admin.teachers.delete");
    Route::post('/get-json', [TeacherController::class, "allTeachersJson"])->name("admin.teachers.api_json");
});

Route::group(['prefix' => "system"], function(){
    Route::group(['prefix' => "field"], function(){
        Route::get('/', [FieldController::class, "index"])->name("admin.fields");
        Route::get('/new', [FieldController::class, "new"])->name("admin.fields.new");
        Route::post('/create', [FieldController::class, "create"])->name("admin.fields.create");
        Route::get('/delete/{id}', [FieldController::class, "delete"])->name("admin.fields.delete");

        Route::group(['prefix' => "{field_slug}"], function(){
            Route::get('/', [LevelController::class, "index"])->name("admin.levels");
            Route::get('/new', [LevelController::class, "new"])->name("admin.levels.new");
            Route::post('/create', [LevelController::class, "create"])->name("admin.levels.create");
            Route::post('/edit', [LevelController::class, "update"])->name("admin.levels.edit");
            Route::get('/delete/{id}', [LevelController::class, "delete"])->name("admin.levels.delete");

            Route::group(['prefix' => "{level_slug}"], function(){
                Route::get('/', [UeController::class, "index"])->name("admin.ues");
                Route::get('/new', [UeController::class, "new"])->name("admin.ues.new");
                Route::post('/create', [UeController::class, "create"])->name("admin.ues.create");
                Route::get('/delete/{id}', [UeController::class, "delete"])->name("admin.ues.delete");
                Route::post('/bulk-upload', [UeController::class, "uploadBulkUes"])->name("admin.ues.bulk_create");
                Route::get('/edit/{ue}', [UeController::class, "edit"])->name("admin.ues.edit");
                Route::post('/update/{ue}', [UeController::class, "update"])->name("admin.ues.update");
            });
        });
    });
});

Route::post('/check-ue', [UeController::class, "check"])->name("admin.ues.check");
