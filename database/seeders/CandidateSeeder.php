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

        $maryCruz = "Profesional con una sólida formación en contabilidad y administración.  Tiene un doctorado en ambas áreas obtenido en la Universidad Técnica de Ambato y la Universidad Rey Juan Carlos de Madrid.";
        $vinicioMejia = "Profesional con una amplia formación académica en diversas áreas, desde ingeniería hasta administración. Es Doctor en Ciencias Sociales, ha realizado estudios de posgrado en universidades de prestigio a nivel nacional e internacional.";
        $juanParedes = "Ingeniero mecánico con una sólida formación académica. Ha obtenido un doctorado en Ciencias en la UNED, Madrid, y cuenta con una maestría en Diseño Mecánico. Su experiencia docente se evidencia con creces.";
        $sandraVillacis = "Profesional de la salud con una amplia trayectoria académica y de servicio a la comunidad. Se graduó como la mejor médica cirujana de la Universidad de Guayaquil y ha sido docente universitaria.";

        Candidate::create(attributes: [
            'nom_can' => 'Mary',
            'ape_can' => 'Cruz Lascano',
            'ruta_can' => 'assets/images/candidates/Mary.jpg',
            'car_can' => 'Rector',
            'tit_can' => 'PhD en Economía de la Empresa y Finanzas',
            'fec_ing_can' => now(),
            'descrip_can' => $maryCruz,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Vinicio',
            'ape_can' => 'Mejía Vayas',
            'ruta_can' => 'assets/images/candidates/Vinicio.jpg',
            'car_can' => 'Vicerrector Académico',
            'tit_can' => 'PhD en Educación',
            'fec_ing_can' => now(),
            'descrip_can' => $vinicioMejia,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Juan',
            'ape_can' => 'Paredes Salinas',
            'ruta_can' => 'assets/images/candidates/Juan.jpg',
            'car_can' => 'Vicerrector de Investigación',
            'tit_can' => 'PhD en Ciencias',
            'fec_ing_can' => now(),
            'descrip_can' => $juanParedes,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Sandra',
            'ape_can' => 'Villacis Valencia',
            'ruta_can' => 'assets/images/candidates/Sandra.jpg',
            'car_can' => 'Vicerrector Administrativo',
            'tit_can' => 'Maestría en Administración',
            'fec_ing_can' => now(),
            'descrip_can' => $sandraVillacis,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);
    }
}
