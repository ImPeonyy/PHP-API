<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;


Route::get('/', [EmployeeController::class,'index'])->name('index');

require __DIR__.'/auth.php';



Route::resource('employee', EmployeeController::class);