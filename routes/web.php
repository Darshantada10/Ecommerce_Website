<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HeroSectionController;

Route::get('/',[HomeController::class,'Index'])->name('home');

Route::get('/login',[AuthController::class,'Login'])->name('login');
Route::post('/login',[AuthController::class,'VerifyUser']);

Route::get('/register',[AuthController::class,'Register'])->name('register');
Route::post('/register',[AuthController::class,'SaveUser']);

Route::get('/logout',[AuthController::class,'Logout'])->name('logout');

Route::get('/admin/dashboard',[AdminController::class,'Index'])->middleware('admin')->name("admin.dashboard");
Route::get('/admin/profile',[AdminController::class,'Profile'])->middleware('admin')->name("admin.profile");
Route::post('/admin/profile',[AdminController::class,'ProfileSave'])->middleware('admin')->name("admin.profile.submit");

Route::get('/admin/all/hero-sections',[HeroSectionController::class,'Index'])->name('admin.all.herosections');
Route::get('/admin/hero-section/create',[HeroSectionController::class,'Create'])->name('admin.create.herosections');
Route::post('/admin/hero-section/create',[HeroSectionController::class,'Save'])->name('admin.save.herosections');

Route::get('admin/hero-section/edit/{id}',[HeroSectionController::class,'Edit'])->name('admin.update.herosections');
Route::post('admin/hero-section/update/{id}',[HeroSectionController::class,'Update'])->name('admin.edit.herosections');

Route::get('admin/hero-section/delete/{id}',[HeroSectionController::class,'Delete'])->name('admin.delete.herosections');