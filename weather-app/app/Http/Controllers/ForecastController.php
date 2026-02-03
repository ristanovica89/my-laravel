<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Forecast;
use Illuminate\Http\Request;

class ForecastController extends Controller
{

    public function showForm()
    {
        $cities = City::with('forecasts')->get();

        return view('admin-forecast', compact('cities'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'min_temp' => 'required|numeric|min:-15|max:10',
            'max_temp' => 'required|numeric|min:5|max:45',
            'description' => 'required|string',
            'date' => 'required',
            'probability' => 'numeric|min:0|max:100',
            'city_id' => 'required|exists:cities,id',
        ]);

        Forecast::create($validated);
        $city = City::where('id',$request->city_id)->first();

        return back()->with('success', 'Forecast for ' . $city->name . ' is successfully added');
    }
}
