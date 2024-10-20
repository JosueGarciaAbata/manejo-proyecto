<?php
namespace Database\Seeders;

use App\Models\Voter;
use App\Models\PoliticalParty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class VoterSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Obtener todos los ID de los partidos políticos
        $politicalPartyIds = PoliticalParty::pluck('id_lis')->toArray();

        for ($i = 0; $i < 10; $i++) {
            Voter::create([
                'nom_vot' => $faker->firstName,
                'ape_vot' => $faker->lastName,
                'ema_vot' => $faker->unique()->email,
                'id_lis_vot' => $faker->randomElement($politicalPartyIds), // Asignar un id_lis_vot aleatorio
            ]);
        }
    }
}
