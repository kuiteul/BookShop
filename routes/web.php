<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardAdmin;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserController;


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('login', [LoginController::class, "index"])->name('login');
Route::post('login', [LoginController::class, "authenticate"]);
Route::post('logout', [LoginController::class, "logout"]);
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);

//Administration Route

Route::get('admin', [DashboardAdmin::class, 'index'])->middleware(['auth', 'verified']);
Route::resource('admin/book', BookController::class)->middleware(['auth', 'verified']);
Route::resource('admin/genre', GenreController::class)->middleware(['auth', 'verified']);
Route::get('admin/user', [UserController::class, 'index'])->middleware(['auth', 'verified']);
Route::get('admin/user/{user_id}', [UserController::class, 'show'])->middleware(['auth', 'verified']);