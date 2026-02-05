<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $city = 'Belgrade';

        $response = Http::get(
            config('services.weather.base_url') . '/weather',
            [
                'q' => $city,
                'appid' => config('services.weather.key'),
                'units' => 'metric',
            ]
        );

        $jsonResponse = $response->json();

        dd($jsonResponse['weather']);

        /*
        response: 
            array:1 [
                0 => array:4 [
                    "id" => 800
                    "main" => "Clear"
                    "description" => "clear sky"
                    "icon" => "01d"
                ]
            ]
        */
    }
}
