<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'country',
        'time_zone',
    ];

    public function weather(){
        return $this->hasOne(Weather::class);
    }

    public function forecasts(){
        return $this->hasMany(Forecast::class)->orderBy('date','asc');
    }

    //  Logika drugacije napravljena, pa mi ne treba za sada
    //
    // public function todaysForecast(){
    //     return $this->hasOne(Forecast::class,'city_id', 'id')
    //                 ->whereDate('date', today())
    //                 ->first();
    // }
}
