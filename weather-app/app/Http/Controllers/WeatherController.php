<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function updateTemperature(Request $request)
    {

        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'temperature' => 'required|numeric|min:-15|max:45',
        ]);

        $weather = Weather::where('city_id', $request-> city_id)->first();
        $weather->update([
            'temperature' => $request->temperature,
        ]);
        
        return back()->with('success', 'Temperature has been successfully updated.');

    }

    public function createWeatherFromApi($cityId, $apiData):Weather
    {
        return Weather::create([
            'city_id'=>$cityId,
            'temperature'=>$apiData['temperature'],
            'description'=>$apiData['description'],
            'icon'=>$apiData['icon'],
        ]);
    }
}
