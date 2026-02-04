<?php

namespace App\Http;

use App\Models\UserCities;

class FavouritesHelper
{

  public static function isFavourited(int $userId, int $cityId): bool
  {
    return UserCities::where('user_id', $userId)
      ->where('city_id', $cityId)
      ->exists();
  }

  // public static function getUserFavouriteCityIds(int $userId): array
  // {
  //   return UserCities::where('user_id', $userId)
  //     ->pluck('city_id')
  //     ->toArray();
  // }
}
