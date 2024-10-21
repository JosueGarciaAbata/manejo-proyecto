<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventsSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'tit_eve'=> 'Gincana',
            'des_eve'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente ipsam nobis magnam eos, ut ipsum? Accusantium, eum eius! Ipsum nihil nemo ipsa culpa sunt? Magni repellendus soluta enim labore ipsum!',
            'fec_pub_eve'=>now(),
            'fec_eve' => Carbon::now()->addDays(5),
            'tag_eve' =>'FISEI, Juegos, 2024',
            'pre_img' => 'assets/images/event/example_preview_event.jpg',
            'res_img' => 'assets/images/resources/example_event.jpg'
        ]);
        
        Event::create([
            'tit_eve' => 'Tech Conference',
            'des_eve' => 'Una conferencia sobre las últimas tendencias en tecnología y software. Habrá talleres, charlas y actividades interactivas.',
            'fec_pub_eve' => now(),
            'fec_eve' => Carbon::now()->addDays(10),
            'tag_eve' => 'Tecnología, Conferencias, 2024',
            'pre_img' => 'assets/images/event/example_preview_event.jpg',
            'res_img' => 'assets/images/resources/example_event.jpg'
        ]);
        
        Event::create([
            'tit_eve' => 'Hackathon Universitario',
            'des_eve' => 'Competencia de desarrollo de software donde equipos trabajarán durante 48 horas para crear soluciones innovadoras.',
            'fec_pub_eve' => now(),
            'fec_eve' => Carbon::now()->addDays(15),
            'tag_eve' => 'Hackathon, Programación, FISEI, 2024',
            'pre_img' => 'assets/images/event/example_preview_event.jpg',
            'res_img' => 'assets/images/resources/example_event.jpg'
        ]);
        
        Event::create([
            'tit_eve' => 'Charla de Ciberseguridad',
            'des_eve' => 'Expertos en ciberseguridad discutirán las amenazas actuales y las mejores prácticas para mantener datos seguros en un mundo digital.',
            'fec_pub_eve' => now(),
            'fec_eve' => Carbon::now()->addDays(20),
            'tag_eve' => 'Ciberseguridad, Seguridad, 2024',
            'pre_img' => 'assets/images/event/example_preview_event.jpg',
            'res_img' => 'assets/images/resources/example_event.jpg'
        ]);
    }
}
