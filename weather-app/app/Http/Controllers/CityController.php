<?php

namespace App\Http\Controllers;

use App\Http\FavouritesHelper;
use App\Models\City;
use App\Services\CityService;
use App\Services\WeatherApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    public function __construct(
        private CityService $cityService,
        private WeatherApiService $weatherApiService)
        {}

    public function index()
    {

        $emojis = $this->getEmojis();
        $date = now()->format('d F');
        $cities = City::with('weather')->get();

        $favouriteCityIds = [];

        if (Auth::check()) {
            $favouriteCityIds = Auth::user()->favouriteCities->pluck('city_id')->toArray();
        }

        return view('welcome', compact('cities', 'emojis', 'date', 'favouriteCityIds'));
    }

    public function adminIndex()
    {
        $cities = $this->cityService->getCitiesWithWeatherForAdmin();

        return view('admin-panel', compact('cities'));
    }

    public function addCity(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:64|unique:cities',
            'country' => 'required|string|max:64',
            'time_zone' => 'required|string',
        ]);

        $this->cityService->createCity($validated);

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
        $cityModel = $this->cityService->findCityByName($city);

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
        $city = null;
        $todayWeather = null;

        $city = $this->cityService->searchForCityByName($request->q);

        if (!$city) {

            $apiData = $this->weatherApiService->getWeatherApiDataForCityFromCommand($request->q);

            if (isset($apiData['error'])) {
                return back()->with('message', $apiData['error']);
            }

            $city = $this->cityService->createCityFromApiData($apiData);
            $cityId = $city->id;
            $todayWeather = $this->weatherApiService->createWeatherFromApiData($cityId, $apiData);
        
        } else {

            if (! $city->weather) {
                $cityName = $city->name;
                $cityId = $city->id;

                $apiData = $this->weatherApiService->getWeatherApiDataForCityFromCommand($cityName);
                $todayWeather = $this->weatherApiService->createWeatherFromApiData($cityId, $apiData);
               
            }else{
                $todayWeather = $city->weather;
            }         
        }

        return back()->with(
            'success',
            'Today\'s weather in ' . ucwords(strtolower($city->name)) .
                ' is ' . $todayWeather->description .
                ', with temperature ' . $todayWeather->temperature . '°C'
        );
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
