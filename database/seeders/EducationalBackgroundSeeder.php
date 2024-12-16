<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EducationalBackground;

class EducationalBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Mary Cruz
        EducationalBackground::create([
            'id_edu' => 1,
            'id_can_edu' => 1,
            'nom_edu' => 'Ph. D. en Economía de la Empresa y Finanzas'
        ]);

        EducationalBackground::create([
            'id_edu' => 2,
            'id_can_edu' => 1,
            'nom_edu' => 'Master Universitario en Administración de Empresas'
        ]);

        EducationalBackground::create([
            'id_edu' => 3,
            'id_can_edu' => 1,
            'nom_edu' => 'Doctora en Contabilidad y Auditoría'
        ]);

        EducationalBackground::create([
            'id_edu' => 4,
            'id_can_edu' => 1,
            'nom_edu' => 'Licenciada en Contabilidad y Auditoría'
        ]);

        // Vinicio Mejías Vayas
        EducationalBackground::create([
            'id_edu' => 5,
            'id_can_edu' => 2,
            'nom_edu' => 'Ph. D en Ciencias Sociales',
        ]);

        EducationalBackground::create([
            'id_edu' => 6,
            'id_can_edu' => 2,
            'nom_edu' => 'Magister en Tecnología de la Información y Multimedia Educativa'
        ]);

        EducationalBackground::create([
            'id_edu' => 7,
            'id_can_edu' => 2,
            'nom_edu' => 'Magister en Administración'
        ]);

        EducationalBackground::create([
            'id_edu' => 8,
            'id_can_edu' => 2,
            'nom_edu' => 'Ingeniero de SIstemas y Computacion'
        ]);

        EducationalBackground::create([
            'id_edu' => 9,
            'id_can_edu' => 2,
            'nom_edu' => 'Ingeniero de Empresas'
        ]);

        EducationalBackground::create([
            'id_edu' => 10,
            'id_can_edu' => 2,
            'nom_edu' => 'Licenciado en Ciencias Administrativas'
        ]);

        // Juan Paredes Salinas
        EducationalBackground::create([
            'id_edu' => 11,
            'id_can_edu' => 3,
            'nom_edu' => 'Ph. D. en Ciencias'
        ]);

        EducationalBackground::create([
            'id_edu' => 12,
            'id_can_edu' => 3,
            'nom_edu' => 'Magister en Diseño Mecánico'
        ]);

        EducationalBackground::create([
            'id_edu' => 13,
            'id_can_edu' => 3,
            'nom_edu' => 'Ingeniero Mecánico'
        ]);

        // Sandra Villacís Valencia
        EducationalBackground::create([
            'id_edu' => 14,
            'id_can_edu' => 4,
            'nom_edu' => 'Especialista en Medicina Interna Universidad de Guayaquil'
        ]);

        EducationalBackground::create([
            'id_edu' => 15,
            'id_can_edu' => 4,
            'nom_edu' => 'Médico Cirujano de la Universidad de Guayaquil'
        ]);

    }


}