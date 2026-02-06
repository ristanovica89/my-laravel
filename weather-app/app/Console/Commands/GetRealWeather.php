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
    protected $signature = 'weather:get {city}';

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

        $response = Http::get(
            config('services.weather.base_url') . '/weather',
            [
                'q' => $this->argument('city'),
                'appid' => config('services.weather.key'),
                'units' => 'metric',
            ]
        );

        $jsonResponse = $response->json();

        if ($jsonResponse["cod"] == 404) {
           $apiRes = [
            'error'=>ucwords($jsonResponse['message']),
           ];
           $this->info(json_encode($apiRes));
           return 1;
        }

        $apiRes = [
            'city_name'=>$jsonResponse['name'],
            'city_country'=>$jsonResponse['sys']['country'],
            'city_time_zone'=>'UTC+' . ($jsonResponse['timezone'] / 3600),
            'temperature'=>$jsonResponse['main']['temp'],
            'description'=>$jsonResponse['weather'][0]['description'],
            'icon'=>$jsonResponse['weather'][0]['icon'],
        ];

        $this->info(json_encode($apiRes));


        return 0;




        //---------------za dalji razvoj-------------------//
        //
        // ----> Po danima (temp u 12h) *Filtriranje*
        //
        // $dailyForecasts = collect($jsonResponse['list'])
        //     ->filter(fn($item) => str_contains($item['dt_txt'], '12:00:00'))
        //     ->values();
        //
        // ----> Mapiranje i prebacivanje u asoc array
        //
        // $tempsForDate = $dailyForecasts->map( fn($item) => [
        //     'date' => substr($item['dt_txt'], 0, 10),
        //     'temperature' => $item['main']['temp'],
        // ])->toArray();
        //
        //
        //  -----> Forecast za 5 dana sa min i max temp (grupisano po 'date')
        //
        // $minMaxTempForDate = collect($jsonResponse['list'])
        //     ->groupBy(fn($item) => substr($item['dt_txt'], 0, 10))
        //     ->map(fn($allItems, $date) => [
        //         'date' => $date,
        //         'min_temp' => collect($allItems)->min(fn($item) => $item['main']['temp']),
        //         'max_temp' => collect($allItems)->max(fn($item) => $item['main']['temp']),
        //     ])
        //     ->values()
        //     ->toArray();
        //
        //   0 => array:3 [
        //     "date" => "2026-02-05"
        //     "min_temp" => 5.56
        //     "max_temp" => 5.56
        //   ]
        //   1 => array:3 [
        //     "date" => "2026-02-06"
        //     "min_temp" => 4.32
        //     "max_temp" => 10.16
        //   ]
        //   2 => array:3 [
        //     "date" => "2026-02-07"
        //     "min_temp" => 6.94
        //     "max_temp" => 8.62
        //   ]
        //   3 => array:3 [
        //     "date" => "2026-02-08"
        //     "min_temp" => 6.22
        //     "max_temp" => 9.49
        //   ]
        //   4 => array:3 [
        //     "date" => "2026-02-09"
        //     "min_temp" => -0.19
        //     "max_temp" => 6.8
        //   ]
        //   5 => array:3 [
        //     "date" => "2026-02-10"
        //     "min_temp" => -1.99
        //     "max_temp" => 3.46
        //   ]
        // ] 
    }
}
