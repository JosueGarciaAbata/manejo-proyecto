<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class EventsSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'tit_eve' => 'Entrevista en Radio Caracol 91.3 FM',
            'des_eve' => 'Participación en entrevista exclusiva con Radio Caracol 91.3 FM.<br> Durante esta conversación, se abordarán temas clave de la campaña, así como propuestas que buscan generar impacto positivo en la comunidad.<br> Es una excelente oportunidad para conectar con la audiencia y aclarar dudas sobre las iniciativas que estamos impulsando.',
            'fec_pub_eve' => now(),
            'fec_ini_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 07:10'),
            'fec_fin_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 08:00'),
            'tag_eve' => 'Radio, Entrevista, Campaña',
            'pre_img' => 'thumbnails/thumb_interview_preview.jpg',
            'res_img' => 'thumbnails/resized_interview.jpg',
            'dir_eve' => 'Radio Caracol'
        ]);
        
        Event::create([
            'tit_eve' => 'Arranque de Campaña en Campus Ingahurco',
            'des_eve' => 'Inicio oficial de la campaña electoral en el Campus Ingahurco.<br> El evento contará con discursos motivacionales, presentaciones de propuestas y la participación activa de estudiantes y docentes. Es un espacio para dialogar, compartir ideas y fortalecer la comunidad académica en torno a objetivos comunes para el futuro.',
            'fec_pub_eve' => now(),
            'fec_ini_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 09:00'),
            'fec_fin_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 11:30'),
            'tag_eve' => 'Campaña, Apertura, Campus',
            'pre_img' => 'thumbnails/thumb_campaign_launch_preview.jpg',
            'res_img' => 'thumbnails/resized_campaign_launch.jpg',
            'dir_eve' => 'Campus Ingahurco'
        ]);
        
        Event::create([
            'tit_eve' => 'Visita a Funcionarios en Campus Huachi',
            'des_eve' => 'Encuentro especial con funcionarios del Campus Huachi.<br> El objetivo es presentar las propuestas detalladas de la campaña, escuchar inquietudes del personal administrativo y académico, y construir alianzas estratégicas que contribuyan al bienestar de la comunidad universitaria. Este diálogo permitirá alinear esfuerzos hacia un desarrollo más inclusivo y eficiente.',
            'fec_pub_eve' => now(),
            'fec_ini_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 13:30'),
            'fec_fin_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 16:30'),
            'tag_eve' => 'Campus, Reunión, Propuestas',
            'pre_img' => 'thumbnails/thumb_meeting_preview.jpg',
            'res_img' => 'thumbnails/resized_meeting.jpg',
            'dir_eve' => 'Campus Huachi'
        ]);
        
        Event::create([
            'tit_eve' => 'Visita al Campus Ingahurco',
            'des_eve' => 'Recorrido por las instalaciones del Campus Ingahurco.<br> Durante la visita, se realizarán reuniones informales con estudiantes y docentes para conocer de cerca sus necesidades e inquietudes.<br> Este tipo de interacción directa permite identificar áreas de mejora y desarrollar soluciones que respondan a las expectativas de la comunidad educativa.',
            'fec_pub_eve' => now(),
            'fec_ini_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 17:00'),
            'fec_fin_eve' => Carbon::createFromFormat('Y-m-d H:i', '2024-10-25 19:00'),
            'tag_eve' => 'Campus, Visita, Estudiantes',
            'pre_img' => 'thumbnails/thumb_campus_visit_preview.jpg',
            'res_img' => 'thumbnails/resized_campus_visit.jpg',
            'dir_eve' => 'Campus Ingahurco'
        ]);

        Event::factory()->count(50)->create();
    }
}
