<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;
use App\Models\Proposal;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $juan = Candidate::where('nom_can', 'Juan')->first();
        $maria = Candidate::where('nom_can', 'María')->first();
        $carlos = Candidate::where('nom_can', 'Carlos')->first();
        $ana = Candidate::where('nom_can', 'Ana')->first();
        $pedro = Candidate::where('nom_can', 'Pedro')->first();

        if (!($juan && $maria && $carlos && $ana && $pedro)) {
            throw new \Exception("No se encontraron todos los candidatos necesarios.");
        }

        Proposal::create([
            'tit_pro' => 'Mejora en Procesos Administrativos',
            'des_pro' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ipsam nobis magnam eos, ut ipsum? Accusantium, eum eius! Ipsum nihil nemo ipsa culpa sunt? Magni repellendus soluta enim labore ipsum!',
            'fec_inc_pro' => '2024-10-01',
            'tags_pro' => 'Administración, Eficiencia',
            'id_can_pro' => $juan->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Innovación en la Educación',
            'des_pro' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ipsam nobis magnam eos, ut ipsum? Accusantium, eum eius! Ipsum nihil nemo ipsa culpa sunt? Magni repellendus soluta enim labore ipsum!',
            'fec_inc_pro' => '2024-09-15',
            'tags_pro' => 'Educación, Innovación',
            'id_can_pro' => $maria->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Investigación Avanzada en Ciencias',
            'des_pro' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ipsam nobis magnam eos, ut ipsum? Accusantium, eum eius! Ipsum nihil nemo ipsa culpa sunt? Magni repellendus soluta enim labore ipsum!',
            'fec_inc_pro' => '2024-08-30',
            'tags_pro' => 'Investigación, Ciencias',
            'id_can_pro' => $carlos->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Gestión Financiera Eficiente',
            'des_pro' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ipsam nobis magnam eos, ut ipsum? Accusantium, eum eius! Ipsum nihil nemo ipsa culpa sunt? Magni repellendus soluta enim labore ipsum!',
            'fec_inc_pro' => '2024-07-20',
            'tags_pro' => 'Finanzas, Gestión',
            'id_can_pro' => $ana->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Reforma Jurídica Institucional',
            'des_pro' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ipsam nobis magnam eos, ut ipsum? Accusantium, eum eius! Ipsum nihil nemo ipsa culpa sunt? Magni repellendus soluta enim labore ipsum!',
            'fec_inc_pro' => '2024-06-10',
            'tags_pro' => 'Derecho, Reforma',
            'id_can_pro' => $pedro->id_can,
        ]);
    }
}
