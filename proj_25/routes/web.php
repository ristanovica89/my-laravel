<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/redis/flush', [ProductController::class, 'clearCacheProducts'] );
Route::post('/product/create', [ProductController::class, 'create']);