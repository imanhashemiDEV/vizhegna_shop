<?php

use Illuminate\Support\Facades\Route;

// Front Routes
Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index']);
Route::get('/product_detail/{id}',[\App\Http\Controllers\Front\FrontProductController::class,'productDetail'])->name('product.detail');





// Admin Routes
Route::prefix('admin')->group(function (){

    Route::get('/',[\App\Http\Controllers\Admin\PanelController::class,'index'])->name('admin.dashboard');
    Route::resource('/categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('/brands',\App\Http\Controllers\Admin\BrandController::class);
    Route::resource('/products',\App\Http\Controllers\Admin\ProductController::class);
    Route::get('/create_product_gallery/{id}',[\App\Http\Controllers\Admin\GalleryController::class,'addGallery'])->name('create.product.gallery');
    Route::post('/store_product_gallery/{id}',[\App\Http\Controllers\Admin\GalleryController::class,'storeGallery'])->name('store.product.gallery');
    Route::delete('/delete_product_gallery/{id}',[\App\Http\Controllers\Admin\GalleryController::class,'deleteGallery'])->name('delete.product.gallery');
    Route::resource('/colors', \App\Http\Controllers\Admin\ColorController::class);
    Route::resource('/property_groups', \App\Http\Controllers\Admin\PropertyGroupController::class);
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
