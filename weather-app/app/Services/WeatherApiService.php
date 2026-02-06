<?php

namespace App\Services;

use App\Models\Weather;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

class WeatherApiService
{

  public function getWeatherApi(string $cityName)
  {
    $response = Http::get(
      config('services.weather.base_url') . '/weather',
      [
        'q' => $cityName,
        'appid' => config('services.weather.key'),
        'units' => 'metric',
      ]
    );

    return $response->json();
  }

  public function getWeatherApiDataForCityFromCommand(string $cityName): array
  {
    Artisan::call('weather:get', [
            'city' => $cityName,
        ]);

        $output = Artisan::output();
        $info = json_decode($output, true) ?? [];

        return $info;
  }

   public function createWeatherFromApiData($cityId, $apiData): Weather
    {
        return Weather::create([
            'city_id'=>$cityId,
            'temperature'=>$apiData['temperature'],
            'description'=>$apiData['description'],
            'icon'=>$apiData['icon'],
        ]);
    }
}
