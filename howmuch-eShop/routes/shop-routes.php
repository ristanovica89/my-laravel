<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

/*************************************************************************************/
//                                    User
/*************************************************************************************/

Route::get('/', [HomePageController::class, 'index'])->name('home.index');

Route::view('/about', 'about')->name('home.about');

// Contacts
Route::controller(ContactController::class)
  ->prefix('contact')
  ->name('contact.')
  ->group(function () {
  Route::get('/', 'index')->name('index');
  Route::post('/send', 'sendMessageFromContactPage')->name('sendMessage');
});

// Shop (Products)
Route::controller(ProductController::class)
->name('products.')
->group(function(){
  Route::get('/shop', 'index')->name('index');
  Route::get('/products/{product}', 'permalink')->name('permalink');
});

// Cart

Route::view('/cart', 'cart');
Route::post('/cart/add', [ShoppingCartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/cart/clear', [ShoppingCartController::class, 'clearCart'])->name('cart.clear');
/*************************************************************************************/
//                                    Admin
/*************************************************************************************/

Route::middleware(['auth', AdminCheckMiddleware::class])
  ->prefix('admin')
  ->group(function () {

    Route::view('/', 'pages-admin/dashboard-admin')->name('admin.dashboard');
    // Products
    //------------------------------------------------------------------------------------
    Route::view('/products/create', 'pages-admin/create-product-admin');
    Route::controller(ProductController::class)
      ->prefix('products')
      ->name('products.')
      ->group(function () {
      Route::get('/', 'getAllProductsForAdmin')->name('getAllProductsForAdmin');
      Route::post('/create', 'storeNewProductAdmin')->name('storeNewProductAdmin');
      Route::post('/update/{product}', 'updateProductById')->name('updateProductById');
      Route::get('/update/{product}', 'getProductForUpdateById')->name('getProductForUpdateById');
      Route::get('/delete/{product}', 'deleteProductById')->name('deleteProductById');
    });

    // Contacts
    //-----------------------------------------------------------------------------------
    Route::controller(ContactController::class)
      ->prefix('contact')
      ->name('contact.')
      ->group(function () {
      Route::get('/all', 'getAllContactsForAdmin')->name('getAllContactsForAdmin');
      Route::get('/delete/{contact}', 'deleteContactById')->name('deleteContactById');
      Route::get('/update/{contact}', 'getContactForUpdateById')->name('getContactForUpdateById');
      Route::post('/update/{contact}', 'updateContactById')->name('updateContactById');
    });
    // Users
    //-------------------------------------------------------------------------------------
    Route::view('/users', 'pages-admin/users-admin')->name('admin.users');
  });
