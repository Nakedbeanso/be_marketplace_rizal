<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BannerController;

Route::post('product-update/{id}' , [ProductController::class, 'update']);
Route::resource('product-types', ProductTypeController::class);
Route::resource('product', ProductController::class);
Route::resource('banner', BannerController::class);
Route::post('banner-update/{id}', [BannerController::class, 'update']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
