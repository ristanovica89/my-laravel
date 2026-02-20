<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomepageController extends Controller
{
    
    public function index()
    {
        $shipments = Cache::remember(
            'unassignedShipments',
            300,
            function(){ 
            return Shipment::where('status',Shipment::STATUS_UNASSIGNED)
                        ->latest()
                        ->take(12)
                        ->get();
            }
        );
            
        return view('homepage', compact('shipments'));
    }
    
}
