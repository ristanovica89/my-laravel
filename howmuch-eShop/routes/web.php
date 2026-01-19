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
Route::view('/admin/products', 'pages-admin/products-admin');
Route::get('/admin/contacts', [ContactController::class, 'get_all_contacts_admin']);
Route::view('/admin/users', 'pages-admin/users-admin');