<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//User

Route::get('/', [HomePageController::class, 'index']);
Route::view('/about', 'about');
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/shop', [ProductController::class, 'index']);

// Admin

Route::view('/admin', 'pages-admin/dashboard-admin');

Route::get('/admin/products', [ProductController::class, 'getAllProductsForAdmin']);
Route::post('/admin/products', [ProductController::class, 'storeNewProductAdmin']);
Route::get('/admin/products/create', [ProductController::class, 'createNewProductAdmin']);


Route::get('/admin/contacts', [ContactController::class, 'getAllContactsForAdmin']);

Route::view('/admin/users', 'pages-admin/users-admin');