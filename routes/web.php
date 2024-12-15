<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HeroSectionController;

Route::get('/',[HomeController::class,'Index'])->name('index');
Route::get('/home',[HomeController::class,'Index'])->name('home');

Route::get('/login',[AuthController::class,'Login'])->name('login')->middleware('guest');
Route::post('/login',[AuthController::class,'VerifyUser'])->middleware('guest');

Route::get('/register',[AuthController::class,'Register'])->name('register')->middleware('guest');
Route::post('/register',[AuthController::class,'SaveUser'])->middleware('guest');

Route::get('/logout',[AuthController::class,'Logout'])->name('logout');


Route::prefix('/admin')->middleware('admin')->group(function(){

    Route::controller(AdminController::class)->group(function(){
        
        Route::get('/dashboard','Index')->name("admin.dashboard");
    
        Route::get('/profile','Profile')->name("admin.profile");
        Route::post('/profile','ProfileSave')->name("admin.profile.submit");
    
    });

    Route::controller(HeroSectionController::class)->group(function(){

        Route::get('/all/hero-sections','Index')->name('admin.all.herosections');

        Route::get('/hero-section/create','Create')->name('admin.create.herosections');
        Route::post('/hero-section/create','Save')->name('admin.save.herosections');

        Route::get('/hero-section/edit/{id}','Edit')->name('admin.update.herosections');
        Route::post('/hero-section/update/{id}','Update')->name('admin.edit.herosections');

        Route::get('/hero-section/delete/{id}','Delete')->name('admin.delete.herosections');

    });

    Route::controller(CategoryController::class)->group(function(){

        Route::get('/all/categories','Index')->name('admin.all.categories');

        Route::get('/category/create','Create')->name('admin.create.category');
        Route::post('/category/create','Save')->name('admin.save.category');

        Route::get('/category/edit/{id}','Edit')->name('admin.update.category');
        Route::post('/category/update/{id}','Update')->name('admin.edit.category');

        Route::get('/category/delete/{id}','Delete')->name('admin.delete.category');
    });

});