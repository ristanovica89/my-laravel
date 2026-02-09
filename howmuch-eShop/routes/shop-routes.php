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
Route::controller(ContactController::class)->group(function(){
  Route::get('/contact','index')->name('contact.index');
  // Create Contact
  Route::post('/contact','sendMessageFromContactPage')->name('contact.sendMessage');
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
    Route::controller(ProductController::class)->group(function(){
      Route::get('/products','getAllProductsForAdmin')->name('products.getAllProductsForAdmin');
      // Store Product
      Route::post('/product-create','storeNewProductAdmin')->name('products.storeNewProductAdmin');
      // Update Product
      Route::post('/product-update/{product}','updateProductById')->name('products.updateProductById');
      Route::get('/product-update/{product}','getProductForUpdateById')->name('products.getProductForUpdateById');
      // Delete Product
      Route::get('/product-delete/{product}','deleteProductById')->name('product.deleteProductById');
    });
    
    // Contacts
    //-----------------------------------------------------------------------------------
    Route::controller(ContactController::class)->group(function(){
      Route::get('/contacts','getAllContactsForAdmin')
        ->name('contacts.getAllContactsForAdmin');
      // Delete Contact
      Route::get('/contact-delete/{contact}','deleteContactById')
        ->name('contact.deleteContactById');
        // Update Contact
      Route::get('/contact-update/{contact}','getContactForUpdateById')
        ->name('contacts.getContactForUpdateById');
      Route::post('/contact-update/{contact}','updateContactById')
        ->name('contacts.updateContactById');
    });
    
    
    // Users
    Route::view('/users', 'pages-admin/users-admin');
  });
