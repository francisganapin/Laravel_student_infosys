<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('students', StudentController::class);
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/table', [StudentController::class, 'index'])->name('students.table');




Route::resource('teachers',TeacherController::class);



use App\Http\Controllers\TeacherSubjectController;

Route::get('/teachers/detail/{id}', [TeacherSubjectController::class, 'show'])
    ->name('teachers.detail');