<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});



Route::resource('students', StudentController::class);

Route::get('/students', [StudentController::class, 'index'])->name('students.index');

Route::get('/students/table', [StudentController::class, 'index'])->name('students.table');

