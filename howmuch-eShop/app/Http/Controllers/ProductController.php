<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    private function getProducts(): array
    {
        return [
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
    }

    public function index()
    {

        $products = $this->getProducts();

        return view('shop', compact('products'));
    }
}
