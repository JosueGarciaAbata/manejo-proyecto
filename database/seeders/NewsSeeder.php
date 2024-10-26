<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::create([
            'tit_new' => 'Aprobada la inscripción de candidaturas para la Elección de Autoridades de la UTA',
            'des_new' => 'El Tribunal Electoral Universitario (TEU) ha notificado oficialmente la aprobación de las candidaturas para el proceso de elección del Rector y Vicerrectores de la Universidad Técnica de Ambato. <br>Este proceso incluye la selección de los Vicerrectores Académico; de Investigación, Innovación y Vinculación con la Sociedad; y Administrativo, para el período 2024 – 2029. Con esta notificación, se da inicio a la fase formal de la campaña electoral, en la cual los candidatos presentarán sus propuestas a la comunidad universitaria. La elección marcará un hito en la vida institucional de la universidad, definiendo su rumbo académico y administrativo para los próximos cinco años.',
            'fec_pub_new' => Carbon::create(2024, 10, 18),
            'tag_new' => 'elecciones, universidad, autoridades, Sueña Crea Innova',
            'pre_img' => 'news_preview_1.jpg',
            'res_img' => 'news_1.jpg',
        ]);

        News::create([
            'tit_new' => 'Inicia la Semana de la Ciencia y Tecnología en la UTA',
            'des_new' => 'La Universidad Técnica de Ambato inaugura la esperada Semana de la Ciencia y Tecnología, un evento anual donde estudiantes y docentes presentan investigaciones innovadoras. <br>Con charlas magistrales, exposiciones de proyectos y talleres, el evento busca promover el desarrollo científico en la comunidad universitaria y la región. <br>Esta edición contará con la participación de expertos nacionales e internacionales.',
            'fec_pub_new' => Carbon::create(2024, 10, 20),
            'tag_new' => 'ciencia, tecnología, innovación',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Foro de Derechos Humanos y Democracia reúne a expertos en la UTA',
            'des_new' => 'La Facultad de Ciencias Sociales de la UTA organiza el Foro de Derechos Humanos y Democracia, donde se discutirán temas de derechos civiles, libertad de expresión y el rol de la democracia en el siglo XXI. <br>El evento contará con la participación de activistas y académicos reconocidos en la región, ofreciendo una perspectiva integral sobre la situación de los derechos humanos en el país.',
            'fec_pub_new' => Carbon::create(2024, 10, 22),
            'tag_new' => 'derechos humanos, democracia, sociedad',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'La UTA recibe acreditación internacional para Ingeniería Ambiental',
            'des_new' => 'El programa de Ingeniería Ambiental de la UTA ha sido acreditado internacionalmente por su excelencia académica y compromiso con la sostenibilidad. <br>Esta acreditación refuerza la calidad de la educación impartida y abre oportunidades de colaboración con instituciones extranjeras, elevando la formación profesional de los estudiantes en el ámbito ambiental.',
            'fec_pub_new' => Carbon::create(2024, 10, 24),
            'tag_new' => 'acreditación, ingeniería ambiental, sostenibilidad',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Conmemoración del Día de la Cultura en la UTA con exposiciones artísticas',
            'des_new' => 'La Universidad Técnica de Ambato celebra el Día de la Cultura con una serie de actividades artísticas y culturales, incluyendo exposiciones de arte, danza y teatro. <br>El evento destaca la importancia de la cultura como pilar fundamental de la formación integral de los estudiantes y promueve el talento de jóvenes artistas locales.',
            'fec_pub_new' => Carbon::create(2024, 10, 26),
            'tag_new' => 'cultura, arte, exposiciones',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Jornada de salud y bienestar estudiantil en la UTA',
            'des_new' => 'En un esfuerzo por fomentar el bienestar integral, la UTA organiza una Jornada de Salud para sus estudiantes, con servicios gratuitos de evaluación médica, odontológica y nutricional. <br>Esta iniciativa busca concientizar a los estudiantes sobre la importancia de la salud preventiva y ofrecerles apoyo en su desarrollo académico y personal.',
            'fec_pub_new' => Carbon::create(2024, 10, 28),
            'tag_new' => 'salud, bienestar, estudiantes',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);

        News::create([
            'tit_new' => 'Nuevas alianzas internacionales impulsan la investigación en la UTA',
            'des_new' => 'La Universidad Técnica de Ambato ha firmado convenios con universidades de Europa y América Latina, con el fin de fortalecer los programas de investigación en ciencia y tecnología. <br>Estas alianzas permitirán el intercambio de docentes y estudiantes, así como el desarrollo de proyectos conjuntos que beneficien a la comunidad universitaria. <br>Con este logro, la UTA refuerza su compromiso con la innovación y la excelencia académica.',
            'fec_pub_new' => Carbon::create(2024, 10, 29),
            'tag_new' => 'investigación, ciencia, tecnología',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Lanzamiento del programa de Voluntariado Social en la UTA',
            'des_new' => 'El Departamento de Bienestar Estudiantil de la UTA ha lanzado un programa de voluntariado enfocado en apoyar a comunidades vulnerables en la región. <br>Estudiantes de diversas facultades podrán participar en proyectos de educación, salud y desarrollo comunitario. <br>La iniciativa tiene como objetivo formar profesionales comprometidos con el bienestar social y el servicio a la comunidad.',
            'fec_pub_new' => Carbon::create(2024, 10, 30),
            'tag_new' => 'bienestar, estudiantes, comunidad',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'La UTA celebra el Día Internacional del Ambiente con actividades de concienciación',
            'des_new' => 'Con motivo del Día Internacional del Ambiente, la UTA ha organizado una serie de actividades para promover la sostenibilidad y el respeto al entorno natural. <br>Se llevarán a cabo charlas, talleres y exposiciones que abordarán temas como el cambio climático y la conservación de recursos. <br>Esta jornada reafirma el compromiso de la universidad con el desarrollo ambientalmente responsable.',
            'fec_pub_new' => Carbon::create(2024, 11, 1),
            'tag_new' => 'sostenibilidad, ambiente, comunidad',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Conferencia sobre Inteligencia Artificial aplicada a la Educación en la UTA',
            'des_new' => 'En el marco de su compromiso con la innovación, la UTA ha organizado una conferencia sobre Inteligencia Artificial (IA) aplicada a la educación superior. <br>Expertos nacionales e internacionales discutirán el impacto de la IA en el proceso de enseñanza y aprendizaje, así como en la gestión universitaria. <br>Esta conferencia busca abrir un espacio de reflexión sobre las oportunidades y desafíos de la tecnología en la academia.',
            'fec_pub_new' => Carbon::create(2024, 11, 3),
            'tag_new' => 'tecnología, educación, innovación',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Jornada de Inclusión y Diversidad en la Universidad Técnica de Ambato',
            'des_new' => 'La UTA organiza la primera Jornada de Inclusión y Diversidad, una iniciativa que busca promover la igualdad y el respeto entre los miembros de la comunidad universitaria. <br>Las actividades incluyen talleres sobre temas de género, discapacidad y diversidad cultural, así como charlas de sensibilización. <br>Este evento es una muestra del compromiso de la universidad con la inclusión y la diversidad.',
            'fec_pub_new' => Carbon::create(2024, 11, 5),
            'tag_new' => 'inclusión, comunidad, estudiantes',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);

        News::create([
            'tit_new' => 'Mary Cruz Propone Plan de Desarrollo Integral para la Juventud',
            'des_new' => 'La candidata Mary Cruz ha presentado un plan integral dirigido a la juventud bajo el lema "Sueña, Crea, Innova". <br>El plan busca impulsar programas de capacitación, emprendimiento y empleabilidad para jóvenes de la región. <br>Mary Cruz afirmó que su propuesta brindará oportunidades para que los jóvenes puedan construir un futuro mejor.',
            'fec_pub_new' => Carbon::create(2024, 10, 18),
            'tag_new' => 'juventud, desarrollo, Sueña Crea Innova',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Candidata Mary Cruz Presenta Iniciativa para Mejorar la Salud Pública',
            'des_new' => 'Durante su campaña, Mary Cruz ha enfatizado la importancia de mejorar los servicios de salud pública. <br>Como parte de la lista "Sueña, Crea, Innova", propone aumentar la inversión en hospitales y centros de salud para asegurar una atención de calidad. <br>La candidata indicó que su iniciativa busca reducir el tiempo de espera en consultas y urgencias.',
            'fec_pub_new' => Carbon::create(2024, 10, 19),
            'tag_new' => 'salud, atención pública, Sueña Crea Innova',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Mary Cruz Aboga por la Protección del Medio Ambiente en Ambato',
            'des_new' => 'En un evento reciente, Mary Cruz destacó la necesidad de preservar los recursos naturales y reducir la contaminación. <br>Como candidata de "Sueña, Crea, Innova", presentó un plan de reciclaje y reforestación para proteger los ecosistemas locales. <br>Mary Cruz afirmó que su compromiso es con un futuro más sostenible y saludable para todos.',
            'fec_pub_new' => Carbon::create(2024, 10, 20),
            'tag_new' => 'medio ambiente, sostenibilidad, Sueña Crea Innova',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Sueña, Crea, Innova: Mary Cruz Impulsa la Economía Local',
            'des_new' => 'Con el fin de fortalecer la economía regional, Mary Cruz ha propuesto medidas para apoyar a los emprendedores locales. <br>Su plan, enmarcado en la lista "Sueña, Crea, Innova", incluye incentivos fiscales y asesoría técnica para pequeñas y medianas empresas. <br>Mary Cruz sostiene que la economía local es la clave para un desarrollo sostenible.',
            'fec_pub_new' => Carbon::create(2024, 10, 21),
            'tag_new' => 'economía, emprendimiento, Sueña Crea Innova',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Mary Cruz Promueve la Educación y Tecnología en su Propuesta Electoral',
            'des_new' => 'Mary Cruz, candidata de "Sueña, Crea, Innova", ha presentado un proyecto para modernizar la educación en la región. <br>El proyecto incluye la incorporación de tecnología en las aulas y capacitación docente en nuevas herramientas digitales. <br>Mary Cruz declaró que una educación moderna es fundamental para el progreso de la comunidad.',
            'fec_pub_new' => Carbon::create(2024, 10, 22),
            'tag_new' => 'educación, tecnología, Sueña Crea Innova',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
        
        News::create([
            'tit_new' => 'Campañas Electorales en su Fase Final: Candidatos Intensifican Actividades',
            'des_new' => 'A pocos días de las elecciones, los candidatos intensifican sus actividades para ganar el voto de la ciudadanía. <br>Con recorridos por diferentes sectores y debates públicos, los aspirantes buscan convencer a los electores con sus propuestas. <br>La expectativa crece mientras la ciudadanía evalúa sus opciones.',
            'fec_pub_new' => Carbon::create(2024, 10, 23),
            'tag_new' => 'elecciones, campañas, candidatos',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);

        News::create([
            'tit_new' => 'Debate Presidencial Reúne a Principales Candidatos de UTA',
            'des_new' => 'El debate presidencial ha reunido a los principales candidatos en una discusión sobre temas clave para el país. <br>Desde economía hasta seguridad, los candidatos expusieron sus planes y estrategias en busca del apoyo de los votantes. <br>Analistas destacan la importancia de este evento para definir las preferencias del electorado.',
            'fec_pub_new' => Carbon::create(2024, 10, 24),
            'tag_new' => 'debate, elecciones, presidencia',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);

        News::create([
            'tit_new' => 'Elecciones 2024: Ciudadanos Se Preparan para Ejercer su Derecho al Voto',
            'des_new' => 'A pocos días de las elecciones, la ciudadanía se prepara para acudir a las urnas y elegir a sus representantes. <br>El Consejo Nacional Electoral ha implementado medidas para garantizar una jornada tranquila y segura. <br>Autoridades recuerdan a los ciudadanos la importancia de participar y hacer valer su derecho al voto.',
            'fec_pub_new' => Carbon::create(2024, 10, 25),
            'tag_new' => 'elecciones, ciudadanía, voto',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);

        News::create([
            'tit_new' => 'Encuesta Electoral Muestra Cambios en las Preferencias de los Votantes',
            'des_new' => 'Una encuesta reciente revela cambios significativos en las preferencias de los votantes para las próximas elecciones. <br>Los resultados muestran un aumento en el apoyo a ciertos candidatos mientras otros ven una ligera disminución. <br>Expertos sugieren que las propuestas de los candidatos sobre economía y seguridad influyen en estos cambios.',
            'fec_pub_new' => Carbon::create(2024, 10, 26),
            'tag_new' => 'encuesta, preferencias, votantes',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);

        News::create([
            'tit_new' => 'Medidas de Seguridad Reforzadas para las Elecciones Nacionales',
            'des_new' => 'El gobierno ha anunciado un refuerzo en las medidas de seguridad para las elecciones nacionales, con el objetivo de asegurar una jornada pacífica. <br>Más de 30,000 agentes estarán desplegados en centros de votación y puntos estratégicos del país. <br>La ciudadanía ha sido invitada a colaborar y mantener el orden durante el proceso electoral.',
            'fec_pub_new' => Carbon::create(2024, 10, 27),
            'tag_new' => 'seguridad, elecciones, gobierno',
            'pre_img' => 'news_preview.jpg',
            'res_img' => 'news_default.jpg',
        ]);
    }
}
