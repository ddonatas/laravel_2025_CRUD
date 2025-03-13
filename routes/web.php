<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

//Route::get('/students', [StudentController::class, 'index']);
Route::resource('students', StudentController::class);

Route::get('/', function () {
    return view('welcome');
});
