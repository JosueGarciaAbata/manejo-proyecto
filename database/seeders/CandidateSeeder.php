<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;
use App\Models\PoliticalParty;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $partyA = PoliticalParty::where('nom_lis', 'Lista A')->first();
        $partyB = PoliticalParty::where('nom_lis', 'Lista B')->first();

        if (!($partyA && $partyB)) {
            throw new \Exception("No valid political parties were found to allocate candidates.");
            return;
        }

        Candidate::create([
            'nom_can' => 'Juan',
            'ape_can' => 'Pérez',
            'ruta_can' => 'assets/images/candidates/candidate.jpg',
            'car_can' => 'Rector',
            'tit_can' => 'PhD en Administración',
            'fec_ing_can' => now(),
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'María',
            'ape_can' => 'Gómez',
            'ruta_can' => 'assets/images/candidates/candidate2.jpg',
            'car_can' => 'Vicerrector Académico',
            'tit_can' => 'PhD en Educación',
            'fec_ing_can' => now(),
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Carlos',
            'ape_can' => 'Sánchez',
            'ruta_can' => 'assets/images/candidates/candidate.jpg',
            'car_can' => 'Vicerrector de Investigación',
            'tit_can' => 'PhD en Ciencias',
            'fec_ing_can' => now(),
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Ana',
            'ape_can' => 'Torres',
            'ruta_can' => 'assets/images/candidates/candidate2.jpg',
            'car_can' => 'Vicerrector Administrativo',
            'tit_can' => 'Maestría en Administración',
            'fec_ing_can' => now(),
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Pedro',
            'ape_can' => 'Martínez',
            'ruta_can' => 'assets/images/candidates/candidate.jpg',
            'car_can' => 'Rector',
            'tit_can' => 'PhD en Derecho',
            'fec_ing_can' => now(),
            'id_pol_par_bel' => $partyB->id_lis,
        ]);
    }
}
