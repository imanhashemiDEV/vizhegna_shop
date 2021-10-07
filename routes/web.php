<?php

use Illuminate\Support\Facades\Route;

// Front Routes
Route::get('/',[\App\Http\Controllers\Front\HomeController::class,'index']);






// Admin Routes
Route::get('/admin',[\App\Http\Controllers\Admin\PanelController::class,'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
