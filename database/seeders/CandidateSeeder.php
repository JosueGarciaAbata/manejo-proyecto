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



        $maryCruz = "Profesional con una sólida formación en contabilidad y administración.  Tiene un doctorado en ambas áreas obtenido en la Universidad Técnica de Ambato y la Universidad Rey Juan Carlos de Madrid.";
        $vinicioMejia = "Profesional con una amplia formación académica en diversas áreas, desde ingeniería hasta administración. Es Doctor en Ciencias Sociales, ha realizado estudios de posgrado en universidades de prestigio a nivel nacional e internacional.";
        $juanParedes = "Ingeniero mecánico con una sólida formación académica. Ha obtenido un doctorado en Ciencias en la UNED, Madrid, y cuenta con una maestría en Diseño Mecánico. Su experiencia docente se evidencia con creces.";
        $sandraVillacis = "Profesional de la salud con una amplia trayectoria académica y de servicio a la comunidad. Se graduó como la mejor médica cirujana de la Universidad de Guayaquil y ha sido docente universitaria.";
        $saraCamacho = "Sara Camacho Estrada es un símbolo de resiliencia y compromiso con la excelencia educativa, dejando un legado que seguirá impactando positivamente a la comunidad universitaria.";


        Candidate::create(attributes: [
            'jerarquia' => 'lider',
            'nom_can' => 'Mary',
            'jerarquia' => 'lider',
            'ape_can' => 'Cruz Lascano',
            'ruta_can' => 'images/candidates/Mary.jpg',
            'car_can' => 'Rector',
            'fec_ing_can' => now(),
            'descrip_can' => $maryCruz,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Vinicio',
            'ape_can' => 'Mejía Vayas',
            'ruta_can' => 'images/candidates/Vinicio.jpg',
            'car_can' => 'Vicerrector Académico',
            'fec_ing_can' => now(),
            'descrip_can' => $vinicioMejia,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Juan',
            'ape_can' => 'Paredes Salinas',
            'ruta_can' => 'images/candidates/Juan.jpg',
            'car_can' => 'Vicerrector de Investigación',
            'fec_ing_can' => now(),
            'descrip_can' => $juanParedes,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);

        Candidate::create([
            'nom_can' => 'Sandra',
            'ape_can' => 'Villacis Valencia',
            'ruta_can' => 'images/candidates/Sandra.jpg',
            'car_can' => 'Vicerrector Administrativo',
            'fec_ing_can' => now(),
            'descrip_can' => $sandraVillacis,
            'id_pol_par_bel' => $partyA->id_lis,
        ]);
    }
}