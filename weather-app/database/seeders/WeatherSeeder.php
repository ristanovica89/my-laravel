<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Weather;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
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

        $faker = Factory::create();
        Weather::create([
            'temperature' => $faker-> numberBetween(-5,35),
            'description' => $faker-> randomElement($this->weatherConditions()),
            'city_id' => $city->id,
        ]);

        $this->command->info('Weather successfully added for city ' . $cityName);
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
