<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\EmployeeController;

Route::view('/', 'home');

Route::get('/employees', [EmployeeController::class, 'index'])->middleware('auth');
Route::get('/employees/create', [EmployeeController::class, 'create'])->middleware('auth');
Route::post('/employees', [EmployeeController::class, 'store'])->middleware('auth');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->middleware('auth');

Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->middleware('auth');
Route::patch('/employees/{employee}', [EmployeeController::class, 'update'])->middleware('auth');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->middleware('auth');
//Companies
Route::get('/companies', [CompanyController::class, 'index'])->middleware('auth');
Route::get('/companies/create', [CompanyController::class, 'create'])->middleware('auth');
Route::post('/companies', [CompanyController::class, 'store'])->middleware('auth');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->middleware('auth');

Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->middleware('auth');
Route::patch('/companies/{company}', [CompanyController::class, 'update'])->middleware('auth');;
Route::delete('/companies/{company}', [CompanyController::class, 'destroy'])->middleware('auth');;

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);


