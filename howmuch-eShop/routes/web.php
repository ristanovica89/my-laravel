<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    
    return view('contact');
});

Route::get('/shop', function () {
    $products = [
        'article1' => [
            'name' => 'Basketball',
            'price' => 49.99,
            'code' => '4342J12',
        ], 
        'article2' => [
            'name' => 'Shoes',
            'price' => 109.99,
            'code' => '112J12',
        ],
    ];
    
    return view('shop', ['products' => $products ]);
});