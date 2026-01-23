<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//User

Route::get('/', [HomePageController::class, 'index'])->name('home.index');
Route::view('/about', 'about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'sendMessageFromContactPage'])->name('contact.sendMessage');

Route::get('/shop', [ProductController::class, 'index'])->name('product.index');

// Admin

Route::view('/admin', 'pages-admin/dashboard-admin');

Route::get('/admin/products', [ProductController::class, 'getAllProductsForAdmin']);
Route::post('/admin/products', [ProductController::class, 'storeNewProductAdmin']);
Route::get('/admin/products/create', [ProductController::class, 'createNewProductAdmin']);
Route::get('/admin/product-delete/{id}', [ProductController::class, 'deleteProductById']);


Route::get('/admin/contacts', [ContactController::class, 'getAllContactsForAdmin']);
Route::get('/admin/contact-delete/{id}', [ContactController::class, 'deleteContactById']);

Route::view('/admin/users', 'pages-admin/users-admin');