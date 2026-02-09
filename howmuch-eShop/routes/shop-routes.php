<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

/*************************************************************************************/
//                                    User
/*************************************************************************************/

Route::get('/', [HomePageController::class, 'index'])->name('home.index');

Route::view('/about', 'about');

// Contacts
Route::controller(ContactController::class)
  ->prefix('contact')
  ->group(function () {
  Route::get('/', 'index')->name('contact.index');
  Route::post('/', 'sendMessageFromContactPage')->name('contact.sendMessage');
});

// Shop (Products)
Route::get('/shop', [ProductController::class, 'index'])->name('product.index');


/*************************************************************************************/
//                                    Admin
/*************************************************************************************/

Route::middleware(['auth', AdminCheckMiddleware::class])
  ->prefix('admin')
  ->group(function () {

    Route::view('/', 'pages-admin/dashboard-admin');
    // Products
    //------------------------------------------------------------------------------------
    Route::view('/products/create', 'pages-admin/create-product-admin');
    Route::controller(ProductController::class)
      ->prefix('product')
      ->group(function () {
      Route::get('/', 'getAllProductsForAdmin')->name('products.getAllProductsForAdmin');
      Route::post('/create', 'storeNewProductAdmin')->name('products.storeNewProductAdmin');
      Route::post('/update/{product}', 'updateProductById')->name('products.updateProductById');
      Route::get('/update/{product}', 'getProductForUpdateById')->name('products.getProductForUpdateById');
      Route::get('/delete/{product}', 'deleteProductById')->name('product.deleteProductById');
    });

    // Contacts
    //-----------------------------------------------------------------------------------
    Route::controller(ContactController::class)
      ->prefix('contact')
      ->group(function () {
      Route::get('/', 'getAllContactsForAdmin')->name('contacts.getAllContactsForAdmin');
      Route::get('/delete/{contact}', 'deleteContactById')->name('contact.deleteContactById');
      Route::get('/update/{contact}', 'getContactForUpdateById')->name('contacts.getContactForUpdateById');
      Route::post('/update/{contact}', 'updateContactById')->name('contacts.updateContactById');
    });
    // Users
    //-------------------------------------------------------------------------------------
    Route::view('/users', 'pages-admin/users-admin');
  });
