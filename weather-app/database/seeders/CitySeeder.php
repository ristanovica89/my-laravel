<?php

namespace Database\Seeders;

use App\Models\City;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amount = (int)$this->command->ask('How many cities?');

        if ($amount <= 0) {
            $this->command->error('You have to input number of cities!');
            return;
        }

        $weatherConditions = ['sunny', 'cloudy', 'windy', 'rainy', 'snowy', 'clear',];


        $faker = Factory::create();

        $this->command->getOutput()->progressStart($amount);

        for ($i = 0; $i < $amount; $i++) {
            $cityName = $this->command->ask('What is the name of city?');

            if (!$cityName) {
                $this->command->error('You have to input name of city!');
                continue;
            }

            if (City::where('name',$cityName)->exists()){
                $this->command->error('City ' . $cityName . ' already exists.');
                continue;
            }

            City::create([
                'name' => $cityName,
                'country' => 'Serbia',
                'time_zone' => 'Europe/Belgrade',
                'temperature' => $faker->numberBetween(-5, 35),
                'weather_condition' => $faker->randomElement($weatherConditions),
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info('Cities are successfully inserted');
    }
}
