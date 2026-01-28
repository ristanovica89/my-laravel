<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckAdminMiddleware;
use Illuminate\Support\Facades\Route;

// USER
Route::middleware('auth')->group(function () {
    Route::get('/', [CityController::class, 'index']);
    Route::get('/forecast/{city}', [CityController::class, 'forecast'])
        ->name('forecast');
});

// ADMIN

Route::middleware(['auth', CheckAdminMiddleware::class])
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [CityController::class, 'adminIndex'])
            ->name('admin-panel');
        Route::view('/city-add', 'admin-pages.add-city-form')
            ->name('add-city-form');
        Route::post('/city-add', [CityController::class, 'addCity'])
            ->name('add-city');
        Route::post('/city-delete/{city}', [CityController::class, 'deleteCityById'])
            ->name('delete-city');
        Route::get('/city-update/{city}', [CityController::class, 'updateCityForm'])
            ->name('update-city-form');
        Route::post('/city-update/{city}', [CityController::class, 'updateCityById'])
            ->name('update-city');
});




//---------------------------------------------------------AUTH-----------------------------------------------//
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
