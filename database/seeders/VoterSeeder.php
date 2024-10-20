<?php

namespace Database\Seeders;

use App\Models\Voter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VoterSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) { 
            Voter::create([
                'nom_vot' => $faker->firstName,  
                'ape_vot' => $faker->lastName,  
                'ema_vot' => $faker->unique()->email, 
            ]);
        }
    }
}
