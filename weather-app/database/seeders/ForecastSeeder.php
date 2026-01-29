<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Forecast;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cityName = $this->command->ask('Enter city name: ');

        $city = City::where('name', $cityName)->first();

        if(! $city){
            $this->command->error('There is no city ' . $cityName . ' on list.');
            return; 
        }

        $days = (int) $this->command->ask('How many days do you want to add forecast for?');

        if ($days <= 0) {
            $this->command->error('You must enter a number greater than 0 !');
            return;
        }

        $faker = Factory::create();
        $this->command->getOutput()->progressStart($days);

        for ($i = 1; $i <= $days; $i++) {
            $date = date('Y-m-d', strtotime("+$i day"));

            Forecast::create([
                'min_temp' => $faker->numberBetween(-5, 5),
                'max_temp' => $faker->numberBetween(15, 35),
                'description' => $faker->randomElement($this->weatherConditions()),
                'date' => $date,
                'city_id' => $city->id,
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info('Forecast successfully added for ' . $days . ' days for city ' . $cityName);
    }

    private function weatherConditions(){
        return ['sunny',
            'cloudy',
            'windy',
            'rainy',
            'snowy',
            'clear',];
    }
}
