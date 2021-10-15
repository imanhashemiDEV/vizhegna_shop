<?php

use Illuminate\Support\Facades\Route;

// Front Routes
Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index']);






// Admin Routes
Route::prefix('admin')->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\PanelController::class,'index'])->name('admin.dashboard');
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/brands',\App\Http\Controllers\Admin\BrandController::class);
    Route::resource('/products',\App\Http\Controllers\Admin\ProductController::class);

});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
