<?php

namespace App\Http\Controllers;

use App\Http\FavouritesHelper;
use App\Models\City;
use App\Models\UserCities;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourites(City $city)
    {
        if(! Auth::check()){
            return back()->with('message','You have to be logged in to make city favourite');
        }
            

        $userId = Auth::user()->id;
        $cityId = $city->id;

        $isFavorite = FavouritesHelper::isFavourited($userId, $cityId);

        if ($isFavorite) {
            UserCities::where('city_id',$cityId)->where('user_id',$userId)->delete();
        } else {
            UserCities::create([
                'city_id' => $cityId,
                'user_id' => $userId,
            ]);
        }

        return back();
    }
}
