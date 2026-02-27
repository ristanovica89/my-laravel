<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomepageController::class, 'index'])->name('home.index');

Route::resource('shipments', ShipmentController::class);
