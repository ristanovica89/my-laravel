<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function __construct(private readonly ProductRepository $productRepository){}
    
    public function index(){
        
        $latestProducts = $this->productRepository->getLatest(5);
        
        

        return view('welcome', compact('latestProducts'));
    }
}
