<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', [StudentController::class, 'showForm'])->name('student.form');
Route::post('/calculate', [StudentController::class, 'calculateMarks'])->name('student.calculate');
