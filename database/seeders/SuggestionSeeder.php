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
        $voters = Voter::all()->pluck('id_vot')->toArray();
        $suggestions = [ 
            [
                "tit_sug" => "Mejorar la seguridad del sistema",
                "des_sug" => "Sería beneficioso implementar nuevas medidas de seguridad para proteger la información de los votantes y evitar fraudes en el sistema de votación."
            ],
            [
                "tit_sug" => "Agregar más métodos de votación",
                "des_sug" => "Permitir el uso de métodos adicionales de votación, como el voto por correo, podría aumentar la participación y facilitar el acceso para aquellos que no pueden votar en persona."
            ],
            [
                "tit_sug" => "Crear una aplicación móvil",
                "des_sug" => "Desarrollar una aplicación móvil para la votación ayudaría a los votantes a participar de manera más fácil y rápida, especialmente en tiempos de pandemia."
            ],
            [
                "tit_sug" => "Implementar votación anticipada",
                "des_sug" => "Permitir la votación anticipada podría dar a los votantes más flexibilidad y reducir las aglomeraciones en el día de las elecciones."
            ],
            [
                "tit_sug" => "Aumentar la transparencia del proceso",
                "des_sug" => "Implementar sistemas de auditoría que permitan a los ciudadanos verificar los resultados de las elecciones aumentará la confianza en el proceso electoral."
            ],
            [
                "tit_sug" => "Ofrecer asistencia en persona",
                "des_sug" => "Proporcionar asistencia en persona para los votantes que necesiten ayuda con el proceso de votación podría mejorar la accesibilidad."
            ],
            [
                "tit_sug" => "Facilitar el registro de votantes",
                "des_sug" => "Crear un sistema en línea para registrar a los votantes facilitará el proceso y aumentará la participación electoral."
            ],
            [
                "tit_sug" => "Educar sobre el proceso electoral",
                "des_sug" => "Realizar campañas educativas sobre cómo votar y la importancia de la participación electoral ayudará a aumentar la conciencia cívica."
            ],
            [
                "tit_sug" => "Implementar recordatorios de votación",
                "des_sug" => "Enviar recordatorios a los votantes sobre las fechas de votación y cómo participar podría aumentar la participación electoral."
            ],
            [
                "tit_sug" => "Mejorar la accesibilidad de los centros de votación",
                "des_sug" => "Asegurarse de que todos los centros de votación sean accesibles para personas con discapacidades es fundamental para garantizar que todos puedan votar."
            ],
            [
                "tit_sug" => "Permitir la votación en línea",
                "des_sug" => "Introducir un sistema de votación en línea podría facilitar el acceso y aumentar la participación de los votantes, especialmente de los jóvenes."
            ],
            [
                "tit_sug" => "Crear un sistema de identificación seguro",
                "des_sug" => "Desarrollar un sistema de identificación que asegure que solo los votantes elegibles puedan votar es clave para mantener la integridad del proceso."
            ],
            [
                "tit_sug" => "Incluir más idiomas en el material electoral",
                "des_sug" => "Asegurarse de que el material electoral esté disponible en varios idiomas ayudará a los votantes que no hablan el idioma oficial."
            ],
            [
                "tit_sug" => "Utilizar tecnología de votación avanzada",
                "des_sug" => "Implementar máquinas de votación más modernas y seguras puede mejorar la experiencia del votante y la seguridad del proceso."
            ],
            [
                "tit_sug" => "Establecer un servicio de atención al votante",
                "des_sug" => "Crear un servicio de atención al votante que responda preguntas y brinde asistencia puede ayudar a los votantes a sentirse más seguros."
            ],
            [
                "tit_sug" => "Fomentar la participación de jóvenes",
                "des_sug" => "Crear programas específicos para involucrar a los jóvenes en el proceso electoral podría aumentar la participación de este grupo demográfico."
            ],
            [
                "tit_sug" => "Crear un sistema de recompensas para votantes",
                "des_sug" => "Introducir incentivos para quienes voten podría motivar a más personas a participar en las elecciones."
            ],
            [
                "tit_sug" => "Facilitar el acceso a información sobre candidatos",
                "des_sug" => "Proveer plataformas donde los votantes puedan informarse sobre los candidatos y sus propuestas es fundamental para una elección informada."
            ],
            [
                "tit_sug" => "Realizar simulacros de votación",
                "des_sug" => "Hacer simulacros de votación antes de las elecciones puede ayudar a familiarizar a los votantes con el proceso y reducir la ansiedad."
            ],
            [
                "tit_sug" => "Mejorar la infraestructura de los centros de votación",
                "des_sug" => "Asegurar que los centros de votación estén bien equipados y sean cómodos para los votantes puede mejorar la experiencia de votación."
            ],
            [
                "tit_sug" => "Proporcionar información clara sobre el proceso de votación",
                "des_sug" => "Asegurar que los votantes tengan acceso a información clara y precisa sobre cómo votar puede ayudar a reducir confusiones."
            ],
            [
                "tit_sug" => "Establecer un canal de comunicación para quejas",
                "des_sug" => "Crear un sistema donde los votantes puedan reportar problemas o quejas puede ayudar a mejorar el proceso electoral."
            ],
            [
                "tit_sug" => "Revisar y actualizar las leyes electorales",
                "des_sug" => "Es fundamental revisar y actualizar periódicamente las leyes electorales para garantizar que sean justas y efectivas."
            ],
            [
                "tit_sug" => "Facilitar el acceso a recursos para votantes",
                "des_sug" => "Proveer recursos en línea que informen a los votantes sobre su derecho a votar y cómo ejercerlo es crucial para la participación."
            ],
            [
                "tit_sug" => "Aumentar la participación de comunidades marginadas",
                "des_sug" => "Desarrollar programas que enfoquen en aumentar la participación de comunidades marginadas puede mejorar la representación en las elecciones."
            ],
            [
                "tit_sug" => "Fomentar el voto responsable",
                "des_sug" => "Promover el voto responsable, donde los votantes investiguen sobre candidatos y propuestas, es esencial para una democracia saludable."
            ]
        ];

        // Crear sugerencias
        foreach ($suggestions as $suggestion) {
            Suggestion::create([
                "tit_sug" => $suggestion['tit_sug'],
                "des_sug" => $suggestion['des_sug'],
                "id_vot_sug" => $faker->randomElement($voters),
            ]);
        }
        

    }
}
