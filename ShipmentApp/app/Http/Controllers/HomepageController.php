<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    
    public function index()
    {
        $shipments = Shipment::latest()->take(12)->get();
        
        return view('homepage', compact('shipments'));
    }
    
}
