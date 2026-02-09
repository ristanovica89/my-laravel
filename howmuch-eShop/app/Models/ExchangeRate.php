<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    protected $table = 'exchange_rates';

    protected $fillable = [
        'amount',
        'currency',
    ];

    const CURRENCY_EUR = 'eur';
    const CURRENCY_USD = 'usd';

    const CURRENCIES_AVAILABLE = [
        self::CURRENCY_EUR,
        self::CURRENCY_USD,
    ];


    public static function isThereCurrencyForToday(string $currency): bool 
    {
        return self::whereDate('created_at', today())
                        ->where('currency', $currency)
                        ->exists();
    }
}
