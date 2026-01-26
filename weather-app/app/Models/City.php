<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'country',
        'time_zone',
        'temperature',
        'weather_condition',
    ];
}
