<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'status',
        'guest_name',
        'guest_email',
        'total_price',
        'address',
        'phone_number',
    ];
}
