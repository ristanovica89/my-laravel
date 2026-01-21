<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    
    public function index(){
        

        $latestProducts = Product::latest('created_at')->take(6)->get();

        return view('welcome', compact('latestProducts'));
    }
}
