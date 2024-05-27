<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('login', [LoginController::class, "index"])->name('login');
Route::post('login', [LoginController::class, "authenticate"]);
Route::post('logout', [LoginController::class, "logout"]);
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);