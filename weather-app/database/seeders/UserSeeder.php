<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $amount = (int)$this->command->ask('How many users you want ti insert?');
        if ($amount <= 0) {
            $this->command->error('You must define amount of users for inserting!');
            return;
        }

        $password = $this->command->ask('What is the password?','12345678');

        $this->command->getOutput()->progressStart($amount);

        for ($i = 0; $i < $amount; $i++) {
            $name = $this->command->ask('Name of user?');
            if (!$name) {
                $this->command->error('You must input user name!');
                continue;
            }

            $email = $this->command->ask('Email of user?');
            if (!$name) {
                $this->command->error('You must input user email!');
                continue;
            }

            if(User::where('email',$email)->exists()){
                $this->command->error('This user is already exists!');
                continue;
            }

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => 'user',
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
        $this->command->info('Users are successfully inserted');
    }
}
