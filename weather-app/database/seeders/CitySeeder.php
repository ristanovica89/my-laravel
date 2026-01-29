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

        $faker = Factory::create();

        $this->command->getOutput()->progressStart($amount);

        for ($i = 0; $i < $amount; $i++) {
            $cityName = $faker->unique()->city();

            if (City::where('name',$cityName)->exists()){
                continue;
            }

            City::create([
                'name' => $cityName,
                'country' => '--',
                'time_zone' => 'World/' . str_replace(' ', '_', $cityName),
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info('Cities are successfully inserted');
    }

    
}
