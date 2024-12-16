<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfessionalExperience;

class ProfessionalExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Mary Cruz
        ProfessionalExperience::create([
            'id_exp' => 1,
            'id_can_exp' => 1,
            'nom_exp' => 'Vicerrectora Academíca de la Universida Técnica de Ambato',
        ]);

        ProfessionalExperience::create([
            'id_exp' => 2,
            'id_can_exp' => 1,
            'nom_exp' => 'Coordinadora de la Carrera de Contabilidad y Auditoría de la Universidad Técnica de Ambato',
        ]);

        ProfessionalExperience::create([
            'id_exp' => 3,
            'id_can_exp' => 1,
            'nom_exp' => 'jefe de Calidad y Responsable de Recursos Humanos -  Holviplas',
        ]);

        ProfessionalExperience::create([
            'id_exp' => 4,
            'id_can_exp' => 1,
            'nom_exp' => 'Representante del Sistema de Calidad - Holviplas',
        ]);

        // Vinicio Mejías Vayas
        ProfessionalExperience::create([
            'id_exp' => 5,
            'id_can_exp' => 2,
            'nom_exp' => 'Coordinador de la Carrera de Administración de Empresas'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 6,
            'id_can_exp' => 2,
            'nom_exp' => 'Docente de Posgrado de la Facultad de Ciencias de la Educación en la Pontificia Universidad Católica del Ecuador'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 7,
            'id_can_exp' => 2,
            'nom_exp' => 'Miembro de la Cumbre Estratégica de la Universidad Técnica de Ambato'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 8,
            'id_can_exp' => 2,
            'nom_exp' => 'Representante Docente ante el Honorable Consejo Universitario'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 9,
            'id_can_exp' => 2,
            'nom_exp' => 'Director de Escuela de Formación Dual en Gerencia de Pequeñas y Medianas Empresas'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 10,
            'id_can_exp' => 2,
            'nom_exp' => 'Director Académico de la Pontificia Universidad Católica del Ecuador Sede Ambato'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 11,
            'id_can_exp' => 2,
            'nom_exp' => 'Director Fundador de la Escuela de Administración de Empresas'
        ]);

        // Juan Paredes Salinas
        ProfessionalExperience::create([
            'id_exp' => 12,
            'id_can_exp' => 3,
            'nom_exp' => 'Docente Titular de la Facultad de Ingeniería Civil y Mecánica de la UTA'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 13,
            'id_can_exp' => 3,
            'nom_exp' => 'Docente de Posgrado e Investigador acreditado por el SENESCYT'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 14,
            'id_can_exp' => 3,
            'nom_exp' => 'Coordinador del centro de apoyo al desarrollo metalmecánico (CADME)'
        ]);


        ProfessionalExperience::create([
            'id_exp' => 15,
            'id_can_exp' => 3,
            'nom_exp' => 'Secretario de la Asociación de Profesores APUA - UTA'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 16,
            'id_can_exp' => 3,
            'nom_exp' => 'Coordinador principal y subrogante de proyectos de investigación UTA y CEDIA'
        ]);

        // Sandra Villacís Valencia
        ProfessionalExperience::create([
            'id_exp' => 17,
            'id_can_exp' => 4,
            'nom_exp' => 'Decana de la Facultad de Ciencias de la Salud de la Universidad Técnica de Ambato'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 18,
            'id_can_exp' => 4,
            'nom_exp' => 'Subdecana de la Facultad de Ciencias de la Salud de la Universidad Técnica de Ambato'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 19,
            'id_can_exp' => 4,
            'nom_exp' => 'Coordinadora de la Carrera de Medicina de la Universidad Técnica de Ambato'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 20,
            'id_can_exp' => 4,
            'nom_exp' => 'Docente Titular Agregada 3 de la Universidad Técnica de Ambato'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 21,
            'id_can_exp' => 4,
            'nom_exp' => 'Médico Tratante de la Dirección Nacional de Tránsito Policía Nacional'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 22,
            'id_can_exp' => 4,
            'nom_exp' => 'Médico Residente del Hospital Naval de Guayaquil'
        ]);

        ProfessionalExperience::create([
            'id_exp' => 23,
            'id_can_exp' => 4,
            'nom_exp' => 'Vicepresidenta Anamer Guayas'
        ]);

    }
}
