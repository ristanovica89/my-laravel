<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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

    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|max:255',
            'price' => 'required|numeric',
        ]);

        Product::create($validated);

        Cache::forget('allProducts');

        return back();
    }

    public function clearCacheProducts(){
    
        Cache::forget('allProducts');

        return redirect()->route('home');
    }
}
