<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidate;
use App\Models\Proposal;
use Faker\Factory as Faker;

class ProposalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mari = Candidate::where('nom_can', 'Mary')->first();
        $vini = Candidate::where('nom_can', 'Vinicio')->first();
        $juan = Candidate::where('nom_can', 'Juan')->first();
        $sandra = Candidate::where('nom_can', 'Sandra')->first();
        $faker = Faker::create();
        $date = now();

        if (!($juan && $mari && $vini && $sandra)) {
            throw new \Exception("No se encontraron todos los candidatos necesarios.");
        }

        Proposal::create([
            'tit_pro' => 'Planificación estratégica',
            'des_pro' => 'Mary Cruz propone actualizar el Plan Estratégico de Desarrollo Institucional (PEDI) para alinearlo con las demandas actuales y los Objetivos de Desarrollo Sostenible (ODS). Su enfoque es claro: metas concretas que abarcan los ámbitos académico, de investigación e innovación, y vinculación con la sociedad. Además, busca fortalecer el presupuesto a través de una autogestión responsable.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Gestión, Vinculación, Innovación, Investigación, ODS, PEDI',
            'img_pro' => 'prop_1.jpg',
            'id_can_pro' => $mari->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Internacionalización',
            'des_pro' => 'Mary Cruz tiene una visión global para la universidad. Su plan incluye promover la internacionalización mediante convenios con universidades extranjeras que faciliten la movilidad estudiantil y docente. Además, se compromete a aumentar la visibilidad de la universidad en rankings internacionales, apoyándose en el fortalecimiento de la investigación y la calidad académica.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Docentes, Estudiantes, Gestión, Investigación, Convenios, Rankings',
            'id_can_pro' => $mari->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Formación y Desarrollo Docente',
            'des_pro' => 'Se cree firmemente en el fortalecimiento continuo de los docentes. La Vicerrectoría Académica impulsará programas de capacitación continua, centrados en el uso de nuevas tecnologías y metodologías pedagógicas innovadoras. Además, se promoverá la formación doctoral de los docentes, facilitando convenios con universidades que ofrezcan programas flexibles.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Docentes, Academia, Gestión, Fortalecimiento, Formación, Internacionalización',
            'id_can_pro' => $vini->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Innovación Pedagógica',
            'des_pro' => 'La educación debe adaptarse a los tiempos y necesidades actuales. Por eso, Vinicio Mejía propone actualizar el modelo educativo de la universidad para mejorar la oferta académica tanto en pregrado como en posgrado. Además, se plantea incrementar la oferta académica de acuerdo a las demandas locales, regionales y nacionales, asegurando que los programas respondan a las necesidades del contexto. Para mayor inclusión y flexibilidad, también se desarrollarán programas de educación híbrida y online, brindando a los estudiantes nuevas oportunidades de aprendizaje.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Innovación, Academia, Docentes, Estudiantes, Educación virtual, Oferta académica',
            'id_can_pro' => $vini->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Acreditación y Mejora Continua',
            'des_pro' => 'La calidad académica es fundamental. Por ello, Vinicio Mejía trabajará en fortalecer el proceso de autoevaluación y acreditación de las carreras, asegurando una mejora constante en la oferta educativa. Además, se fomentará la creación de nuevos programas de posgrado que respondan a las demandas actuales del mercado laboral y la sociedad, garantizando que los egresados tengan las competencias necesarias para enfrentar los desafíos del futuro.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Docentes, Estudiantes, Academia, Innovación, Acreditación, Mejora, Autoevaluación',
            'id_can_pro' => $vini->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Fomento a la Investigación',
            'des_pro' => 'Buscará fortalecer la investigación mediante la creación de un fondo competitivo que financie proyectos de alto impacto y publicaciones científicas en revistas indexadas. Además, se promoverá la creación de redes de investigación interdisciplinarias, tanto a nivel nacional como internacional, facilitando la colaboración entre diferentes áreas del conocimiento.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Fortalecimmiento, Investigación, Interdisciplinarias, Internacionalización, Docentes, Gestión',
            'id_can_pro' => $juan->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Innovación y Transferencia Tecnológica',
            'des_pro' => 'La innovación es un motor para el progreso, y por ello, Juan Paredes planea crear un ecosistema de innovación dentro de la universidad, que incluirá incubadoras de empresas y laboratorios especializados en innovación social y tecnológica. Este ecosistema permitirá fomentar la colaboración con el sector productivo mediante la transferencia de tecnología y la comercialización de productos derivados de la investigación universitaria, generando un impacto positivo en el desarrollo económico y social.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Innovación, Tecnología, Progreso, Investigación, Internacionalización, Docentes, Gestión',
            'id_can_pro' => $juan->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Vinculación con la Sociedad',
            'des_pro' => 'Para promover un impacto directo en la sociedad, se implementarán proyectos de vinculación orientados a resolver problemas locales y nacionales, alineados con los Objetivos de Desarrollo Sostenible (ODS). Estos proyectos estarán diseñados para abordar necesidades reales, mejorando la calidad de vida y el desarrollo sostenible. Además, se fortalecerán las relaciones con empresas, gobiernos locales y organizaciones no gubernamentales, asegurando la colaboración en proyectos que generen un impacto social positivo.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Vinculación, Estudiantes, Sociedad, Sostenibilidad, Docentes, Gestión',
            'id_can_pro' => $juan->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Optimización de Recursos',
            'des_pro' => 'Sandra Villacís se compromete a implementar un sistema de gestión de recursos basado en indicadores de eficiencia, lo que permitirá un uso transparente y optimizado del presupuesto de la universidad. Además, para modernizar la gestión administrativa, se apostará por la automatización de procesos a través de plataformas digitales, mejorando el control y manejo de los recursos de manera más ágil y eficaz.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Gestión, Administrativa, Procesos, Tecnología, Gestión, Infraestructura',
            'id_can_pro' => $sandra->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Infraestructura y Tecnología',
            'des_pro' => 'La modernización de la infraestructura es fundamental para una universidad de excelencia. En este sentido, se buscará mejorar los espacios físicos y tecnológicos, asegurando instalaciones para la enseñanza y el bienestar de la comunidad universitaria. Se promoverá el uso de energías renovables y la implementación de políticas de sostenibilidad ambiental.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Mejoramiento, Bienestar, Compromiso, Tecnología, Innovación, Academia, Investigación, Infraestructura, Sostenibilidad',
            'id_can_pro' => $sandra->id_can,
        ]);

        Proposal::create([
            'tit_pro' => 'Bienestar y Desarrollo del Talento Humano',
            'des_pro' => 'El bienestar de los empleados es una prioridad para la candidata. Se revisarán las remuneraciones del personal administrativo para asegurar que estén alineadas con sus responsabilidades. Además, se implementarán programas de bienestar laboral y capacitación continua en tecnologías y gestión, promoviendo un entorno de crecimiento profesional. Finalmente, se impulsará un ambiente inclusivo y equitativo, garantizando políticas de igualdad de género y no discriminación en todas las áreas de trabajo.',
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Remuneraciones, Responsabilidades, Crecimiento profesional, Tecnología, Personal Administrativo, Gestión',
            'id_can_pro' => $sandra->id_can,
        ]);
        
        Proposal::create([
            'tit_pro' => 'Fortalecimiento de la Gobernabilidad Universitaria',
            'des_pro' => 'Bajo el liderazgo de Mary Cruz, la universidad promoverá una participación inclusiva, donde docentes, estudiantes y personal administrativo serán parte activa en la toma de decisiones, se fomentará un ambiente laboral en armonía, unión y paz, con el fin de conseguir objetivos institucionales acordes con las aspiraciones de cada miembro de la familia de la UTA.', 
            'fec_inc_pro' => $faker->dateTimeBetween($date,'+5 years'),
            'tags_pro' => 'Armonía, Unión y paz, Transparencia, Docentes, Estudiantes, Personal Administrativo, Gestión',
            'id_can_pro' => $mari->id_can,
        ]);
    }
}
