<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminCheckMiddleware;
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

Route::middleware(['auth', AdminCheckMiddleware::class])
  ->prefix('admin')
  ->group(function () {

    Route::view('/', 'pages-admin/dashboard-admin');
    // Products
    //------------------------------------------------------------------------------------
    Route::get('/products', [ProductController::class, 'getAllProductsForAdmin'])
      ->name('products.getAllProductsForAdmin');
    // Store Product
    Route::post('/product-create', [ProductController::class, 'storeNewProductAdmin'])
      ->name('products.storeNewProductAdmin');

    // Update Product
    Route::post('/product-update/{product}', [ProductController::class, 'updateProductById'])
      ->name('products.updateProductById');

    Route::get('/product-update/{product}', [ProductController::class, 'getProductForUpdateById'])
      ->name('products.getProductForUpdateById');

    Route::view('/products/create', 'pages-admin/create-product-admin');

    // Delete Product
    Route::get('/product-delete/{product}', [ProductController::class, 'deleteProductById'])
      ->name('product.deleteProductById');

    // Contacts
    //-----------------------------------------------------------------------------------
    Route::get('/contacts', [ContactController::class, 'getAllContactsForAdmin'])
      ->name('contacts.getAllContactsForAdmin');

    Route::get('/contact-delete/{contact}', [ContactController::class, 'deleteContactById'])
      ->name('contact.deleteContactById');

    // Update Contact

    Route::get('/contact-update/{contact}', [ContactController::class, 'getContactForUpdateById'])
      ->name('contacts.getContactForUpdateById');

    Route::post('/contact-update/{contact}', [ContactController::class, 'updateContactById'])
      ->name('contacts.updateContactById');

    // Users
    Route::view('/users', 'pages-admin/users-admin');
  });
