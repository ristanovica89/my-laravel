<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {

        $emojis = [
            'sunny' => '☀️',
            'cloudy' => '☁️',
            'windy' => '🌬️',
            'rainy' => '🌧️',
            'snowy' => '❄️',
            'clear' => '🌟',
        ];

        $cities = City::all();

        return view('welcome', compact('cities', 'emojis'));
    }

    public function adminIndex()
    {
        $cities = City::all();

        return view('admin-panel', compact('cities'));
    }

    public function addCity(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'country' => 'required|string|max:64',
            'time_zone' => 'required|string',
            'temperature' => 'required|integer',
            'weather_condition' => 'required|string|max:64',
        ]);

        City::create($validated);

        return redirect(route('admin-panel'))->with('success', 'City has been successfully added.');
    }

    public function deleteCityById(City $city)
    {
        $city->delete();

        return back()->with('success', 'City has been deleted successfully.');
    }

    public function updateCityForm(City $city)
    {
        return view('admin-pages.update-city-form', compact('city'));
    }

    public function updateCityById(Request $request, City $city)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64',
            'country' => 'required|string|max:64',
            'time_zone' => 'required|string',
            'temperature' => 'required|integer',
            'weather_condition' => 'required|string|max:64',
        ]);

        $city->update($validated);

        return redirect(route('admin-panel'))->with('success', 'City has been successfully updated.');
    }
}
