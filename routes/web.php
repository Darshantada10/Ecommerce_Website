<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

// Route::get('/', function () {
//     return view('Home.Index');
// });


Route::get('/',[HomeController::class,'Index']);

Route::get('/login',[AuthController::class,'Login'])->name('login');
Route::post('/login',[AuthController::class,'VerifyUser']);

Route::get('/register',[AuthController::class,'Register'])->name('register');
Route::post('/register',[AuthController::class,'SaveUser']);

Route::get('/logout',[AuthController::class,'Logout'])->name('logout');

Route::get('/admin/dashboard',[AdminController::class,'Index'])->middleware('admin');