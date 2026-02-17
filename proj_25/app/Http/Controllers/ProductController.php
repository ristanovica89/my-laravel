<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{

    public function index()
    {
        // $products = [];
        // 
        // if(Cache::has('allProducts')){
        //     $products = Cache::get('allProducts',[]);
        //     //echo "Cache";
        // }else{
        //     $products = Product::latest()->take(9)->get();
        //     Cache::put('allProducts', $products, 500);
        // }

        $products = Cache::remember('allProducts', 300, fn()=> Product::latest()->take(9)->get());

        return view('welcome', compact('products'));
    }

    public function create(StoreProductRequest $request)
    {
        Product::create($request->validated());

        Cache::forget('allProducts');

        return back();
    }

    public function clearCacheProducts(){
    
        Cache::forget('allProducts');

        return redirect()->route('home');
    }
}
