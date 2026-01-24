<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*************************************************************************************/
//                                    User
/*************************************************************************************/

Route::get('/', [HomePageController::class, 'index'])
  ->name('home.index');

// About
Route::view('/about', 'about');

// Contacts
Route::get('/contact', [ContactController::class, 'index'])
  ->name('contact.index');
Route::post('/contact', [ContactController::class, 'sendMessageFromContactPage'])
  ->name('contact.sendMessage');

// Shop (Products)
Route::get('/shop', [ProductController::class, 'index'])
  ->name('product.index');


/*************************************************************************************/
//                                    Admin
/*************************************************************************************/

Route::view('/admin', 'pages-admin/dashboard-admin');

// Products
//------------------------------------------------------------------------------------
Route::get('/admin/products', [ProductController::class, 'getAllProductsForAdmin'])
  ->name('products.getAllProductsForAdmin');
// Store Product
Route::post('/admin/product-create', [ProductController::class, 'storeNewProductAdmin'])
  ->name('products.storeNewProductAdmin');

// Update Product
Route::post('/admin/product-update/{product}', [ProductController::class, 'updateProductById'])
  ->name('products.updateProductById');

Route::get('/admin/product-update/{product}', [ProductController::class, 'getProductForUpdateById'])
  ->name('products.getProductForUpdateById');

Route::view('/admin/products/create', 'pages-admin/create-product-admin');

// Delete Product
Route::get('/admin/product-delete/{product}', [ProductController::class, 'deleteProductById'])
  ->name('product.deleteProductById');

// Contacts
//-----------------------------------------------------------------------------------
Route::get('/admin/contacts', [ContactController::class, 'getAllContactsForAdmin'])
  ->name('contacts.getAllContactsForAdmin');

Route::get('/admin/contact-delete/{contact}', [ContactController::class, 'deleteContactById'])
  ->name('contact.deleteContactById');

// Update Contact

Route::get('/admin/contact-update/{contact}', [ContactController::class, 'getContactForUpdateById'])
  ->name('contacts.getContactForUpdateById');

Route::post('/admin/contact-update/{contact}', [ContactController::class, 'updateContactById'])
  ->name('contacts.updateContactById');

// Users
Route::view('/admin/users', 'pages-admin/users-admin');