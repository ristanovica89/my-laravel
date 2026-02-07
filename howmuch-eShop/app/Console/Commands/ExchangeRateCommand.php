<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class ExchangeRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rate:fetch {code}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Currency conversion';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // https://kurs.resenje.org/api/v1/currencies/eur/rates/today

        $code = $this->argument('code');

        $codes = ['eur', 'usd'];

        if (! in_array($code, $codes)){
            return $this->output->error('Wrong code');
        }

        $response = Http::get(
            config('services.currency.base_url') .
                   "/{$code}" . 
                   "/rates/today");

        $jsonResponse = $response->json();

        $apiResponse = [
            'code' => $jsonResponse['code'],
            'date' => $jsonResponse['date'],
            'exchange_middle' => $jsonResponse['exchange_middle'],
            'converted_to' => 'RSD'
        ];

        return $apiResponse;
    }
}
