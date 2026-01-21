<?php

use App\Http\Controllers\OcenaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');

Route::view('/ocene/dodaj', 'dodaj-ocenu');

Route::get('/ocene', [OcenaController::class, 'index']);
Route::get('/ocene/ucenik', [OcenaController::class, 'sveOceneUcenika']);
Route::post('/ocene', [OcenaController::class, 'dodajOcenu']);