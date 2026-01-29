<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forecast extends Model
{
    protected $table = 'forecasts';

    protected $fillable = [
        'min_temp',
        'max_temp',
        'description',
        'date',
        'city_id',
    ];

    protected $casts = [
        'date' => 'datetime'
    ];
}
