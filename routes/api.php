<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\EmployeeController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('employees',EmployeeController::class);
    // get -> index -> get all employees
    // post -> store -> save employees data
    // get -> show -> single employees data
    // put/patch -> update -> update single employees data
    // delete/get/post -> destroy -> destroy single employees data

    // Route::controller(ProductController::class)->group(function(){

    //     Route::get('/all/products','Index')->name('admin.all.products');

    //     Route::get('/product/create','Create')->name('admin.create.product');
    //     Route::post('/product/create','Save')->name('admin.save.product');

    //     Route::get('/product/edit/{id}','Edit')->name('admin.update.product');
    //     Route::post('/product/update/{id}','Update')->name('admin.edit.product');

    //     Route::get('/product/delete/{id}','Delete')->name('admin.delete.product');
    // });