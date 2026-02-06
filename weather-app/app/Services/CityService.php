<?php

namespace App\Services;

use App\Models\City;
use Illuminate\Database\Eloquent\Collection;

class CityService
{

  public function createCity(array $data): City
  {
    return City::create($data);
  }

  public function searchForCityByName(string $cityName): City | null
  {
    return City::where('name', 'like', '%' . $cityName . '%')->first();
  }

  public function findCityByName(string $cityName): City | null
  {
    return City::where('name', ucwords($cityName))->first();
  }

  public function createCityFromApiData($apiData): City
  {
    return City::create([
      'name' => $apiData['city_name'],
      'country' => $apiData['city_country'],
      'time_zone' => $apiData['city_time_zone'],
    ]);
  }

  public function getCitiesWithWeatherForAdmin(): Collection
  {
    return City::with(['weather:id,city_id,temperature'])->get();
  }
}
