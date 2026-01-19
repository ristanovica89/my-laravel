<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    private function get_latest_products(int $n){
        
        return Product::latest('created_at')->take($n)->get();

    }

    public function index(){
        

        $latestProducts = $this->get_latest_products(6);

        return view('welcome', compact('latestProducts'));
    }
}
