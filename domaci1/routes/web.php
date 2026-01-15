<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $message = 'Welcome To Our Shop!';
    return view('welcome',['message' => $message]);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    $contacts = [
        'email' => 'our@shop.com',
        'tel' => '+381/60 111-22-33',
        'address' => 'Laravelska 12'
    ];
    return view('contact', ['contacts' => $contacts]);
});

Route::get('/shop', function () {
    $products = [
        'article1' => [
            'name' => 'Basketball',
            'price' => 50,
            'code' => '4342J12',
        ], 
        'article2' => [
            'name' => 'Shoes',
            'price' => 110,
            'code' => '112J12',
        ],
    ];
    
    return view('shop', ['products' => $products ]);
});
