<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        'temperature',
        'description',
        'icon',
        'city_id',
    ];

}
