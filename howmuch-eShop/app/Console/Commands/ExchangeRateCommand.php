<?php

namespace App\Console\Commands;

use App\Models\ExchangeRate;
use Carbon\Carbon;
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

        $code = $this->argument('code');


        if (! in_array($code, ExchangeRate::CURRENCIES_AVAILABLE)){
            return $this->output->error('Wrong code');
        }

        $response = Http::get(
            config('services.currency.base_url') .
                   "/{$code}" . 
                   "/rates/today");

        $jsonResponse = $response->json();

        if(ExchangeRate::isThereCurrencyForToday($jsonResponse['code'])){
            return $this->output->error('Already updated currency');
        }
        
        ExchangeRate::create([
            'currency' => $jsonResponse['code'],
            'amount' => $jsonResponse['exchange_middle'],
        ]);

        return 0;
    }
}
