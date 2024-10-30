<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PoliticalParty;

class PoliticalPartiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PoliticalParty::create([
            'nom_lis' => 'Lista A',
            'des_lis' => 'Descripción de la lista A',
            'mis_vis_lis' => 'Transformar la Universidad Técnica de Ambato en un referente de excelencia académica y de investigación, promoviendo un ambiente inclusivo y participativo que potencie el desarrollo integral de nuestros estudiantes, docentes y la comunidad. Aspiramos a construir una UTA moderna, comprometida con la calidad educativa, la innovación y la responsabilidad social, formando profesionales competentes y éticos que enfrenten los desafíos del mundo actual y contribuyan al desarrollo sostenible del país.',
            'img_pol_par'=>'\assets\images\lists\mary.jpg'
        ]);
        PoliticalParty::create([
            'nom_lis' => 'Lista B',
            'des_lis' => 'Descripción de la lista B',
            'mis_vis_lis' => 'Transformar la Universidad Técnica de Ambato en un referente de excelencia académica y de investigación, promoviendo un ambiente inclusivo y participativo que potencie el desarrollo integral de nuestros estudiantes, docentes y la comunidad. Aspiramos a construir una UTA moderna, comprometida con la calidad educativa, la innovación y la responsabilidad social, formando profesionales competentes y éticos que enfrenten los desafíos del mundo actual y contribuyan al desarrollo sostenible del país.',
            'img_pol_par'=>'\assets\images\lists\camacho.jpg'
        ]);
    }
}