<?php

use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\JSTaskController;
use App\Http\Controllers\Admin\ProductController;

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
    
    Route::controller(BrandController::class)->group(function(){

        Route::get('/all/brands','Index')->name('admin.all.brands');

        Route::get('/brand/create','Create')->name('admin.create.brand');
        Route::post('/brand/create','Save')->name('admin.save.brand');

        Route::get('/brand/edit/{id}','Edit')->name('admin.update.brand');
        Route::post('/brand/update/{id}','Update')->name('admin.edit.brand');

        Route::get('/brand/delete/{id}','Delete')->name('admin.delete.brand');
    });

    Route::controller(ProductController::class)->group(function(){

        Route::get('/all/products','Index')->name('admin.all.products');

        Route::get('/product/create','Create')->name('admin.create.product');
        Route::post('/product/create','Save')->name('admin.save.product');

        Route::get('/product/edit/{id}','Edit')->name('admin.update.product');
        Route::post('/product/update/{id}','Update')->name('admin.edit.product');

        Route::get('/product/delete/{id}','Delete')->name('admin.delete.product');
    });

    Route::controller(ProductController::class)->group(function(){

        Route::get('/all/products','Index')->name('admin.all.products');

        Route::get('/product/create','Create')->name('admin.create.product');
        Route::post('/product/create','Save')->name('admin.save.product');

        Route::get('/product/edit/{id}','Edit')->name('admin.update.product');
        Route::post('/product/update/{id}','Update')->name('admin.edit.product');

        Route::get('/product/delete/{id}','Delete')->name('admin.delete.product');
    });

    Route::controller(JSTaskController::class)->group(function(){
        
        Route::get('/all/tasks','Index')->name('admin.all.tasks');
        Route::get('/api/all/tasks','APIAllData')->name('admin.all.tasks.api');
        // Route::get('/api/task/save','Store')->name('admin.save.task');   
        Route::post('/api/task/save','Store')->name('admin.save.task');
        // Route::get('/api/task/update','Update')->name('admin.update.task');
        Route::post('/api/task/update','Update')->name('admin.update.task');
        Route::get('/api/task/delete','Delete')->name('admin.delete.task');

        // there 2 possibilities
        // 1) you can create seprate pages for each save or update method and then you will have to create route and url for that aswell (you should avoid) but if the content is so long or form is lengthy then you can create seprate pages for that but that depends on you
        // 2) most common pratice is to do everything on a single page and open pop up forms to fill up data
        // SPA (Single Page Application)


    });


});