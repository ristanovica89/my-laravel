<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    protected $fillable = [
    'title',
    'from_city',
    'from_country',
    'to_city',
    'to_country',
    'price',
    'status',
    'details',
    'user_id',
];

}
