<?php

namespace Database\Seeders;

use App\Models\Suggestion;
use App\Models\Voter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class SuggestionSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Obtener todos los votantes existentes
        $voters = Voter::all();

        // Iterar sobre los votantes para asignarles sugerencias
        foreach ($voters as $voter) {
            // Crear entre 1 y 5 sugerencias para cada votante
            for ($j = 0; $j < rand(1, 5); $j++) {
                Suggestion::create([
                    'tit_su' => $faker->sentence(3),   // Título de la sugerencia
                    'des_sug' => $faker->paragraph,    // Descripción de la sugerencia
                    'id_vot_sug' => $voter->id_vot,    // Relación con el votante
                ]);
            }
        }
    }
}
