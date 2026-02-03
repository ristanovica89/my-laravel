<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {

        $emojis = $this->getEmojis();

        $cities = City::with('weather')->get();
        
        $date = now()->format('d F');

        return view('welcome', compact('cities', 'emojis', 'date'));
    }

    public function adminIndex()
    {
        $cities = City::with(['weather:id,city_id,temperature'])->get();

        return view('admin-panel', compact('cities'));
    }

    public function addCity(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64|unique:cities',
            'country' => 'required|string|max:64',
            'time_zone' => 'required|string',
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
            'name' => 'required|string|max:64|unique:cities,name,' . $city->id,
            'country' => 'required|string|max:64',
            'time_zone' => 'required|string',
        ]);

        $city->update($validated);

        return redirect(route('admin-panel'))->with('success', 'City has been successfully updated.');
    }

    public function forecast($city)
    {
        $cityModel = City::where('name', ucwords($city))->first();

        if ($cityModel === null) {
            return back()->with('message', 'There is no ' . $city . ' on list.');
        }

        if (! $cityModel->forecasts()->exists()) {
            return back()->with('message', 'No forecast for ' . $cityModel->name);
        }

        $name = $cityModel->name;
        $country = $cityModel->country;
        $emojis = $this->getEmojis();
        $cityForecasts = $cityModel->forecasts;

        return view('forecast', compact('cityForecasts', 'name', 'country', 'emojis'));
    }

    public function searchCity(Request $request)
    {
    
        $city = City::where('name','like', '%'.$request->q.'%' )->first();
        
        
        if(! $city){
            return back()->with('message', 'We dont have info for ' . $request->q . '!');
        }

        $todayForecast = $city->forecasts()->whereDate('date', today())->first();

        if(! $todayForecast){
            return back()->with('message', 'We dont have info for ' . $request->q . '!');
        }

        return back()->with('success','Today weather in '. ucwords(strtolower($request->q)) . ' is : ' . ucwords($todayForecast->description) );
        
    }

    public function forecastDummy($city)
    {
        $forecast = [
            'Belgrade' => [13, 16, 11, 9, 7],
            'Novi Sad' => [10, 6, 1, -2, 0],
        ];

        $cityModel = City::where('name', ucwords($city))->first();

        if ($cityModel === null) {
            return back()->with('message', 'There is no city with that name.');
        }

        if (!array_key_exists($cityModel->name, $forecast)) {
            return back()->with('message', 'No weather forecast for ' . $cityModel->name);
        }

        $name = $cityModel->name;
        $emojis = $this->getEmojis();
        $cityForecast = [];

        foreach ($forecast[$cityModel->name] as $temp) {
            $cityForecast[] = new City([
                'name' => $cityModel->name,
                'country' => $cityModel->country,
                'time_zone' => $cityModel->time_zone,
                'temperature' => $temp,
                'weather_condition' => 'clear',
            ]);
        }

        return view('forecast', compact('cityForecast', 'name', 'emojis'));
    }

    private function getEmojis()
    {
        return [
            'sunny' => '☀️',
            'cloudy' => '☁️',
            'windy' => '🌬️',
            'rainy' => '🌧️',
            'snowy' => '❄️',
            'clear' => '🌟',
        ];
    }
}
