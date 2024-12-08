<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', [EmployeeController::class,'index'])->name('index');

require __DIR__.'/auth.php';

Route::apiResource('employee', EmployeeController::class);