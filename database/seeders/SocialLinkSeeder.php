<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Mary Cruz Lascano
        SocialLink::create([
            'id_can_soc' => 1,
            'id_icon_soc' => 1,
            'platform_soc' => 'Facebook',
            'url_soc' => 'https://www.facebook.com/profile.php?id=61565950187878&locale=es_LA',
        ]);

        SocialLink::create([
            'id_can_soc' => 1,
            'id_icon_soc' => 2,
            'platform_soc' => 'Instagram',
            'url_soc' => 'https://www.instagram.com/marycruzlascano',
        ]);

        // Vinicio Mejía Vayas
        SocialLink::create([
            'id_can_soc' => 2,
            'id_icon_soc' => 1,
            'platform_soc' => 'Facebook',
            'url_soc' => 'https://www.facebook.com/vinicio.mejia.564?mibextid=LQQJ4d',
        ]);

        SocialLink::create([
            'id_can_soc' => 2,
            'id_icon_soc' => 2,
            'platform_soc' => 'Instagram',
            'url_soc' => 'https://www.instagram.com/vinicio.mejia.564?igsh=dHBqZ3A5azR0MnF2',
        ]);

        // Juan Paredes Salinas
        SocialLink::create([
            'id_can_soc' => 3,
            'id_icon_soc' => 1,
            'platform_soc' => 'Facebook',
            'url_soc' => 'https://www.facebook.com/juan.paredes.5264382?locale=es_LA',
        ]);

        SocialLink::create([
            'id_can_soc' => 3,
            'id_icon_soc' => 2,
            'platform_soc' => 'Instagram',
            'url_soc' => 'https://www.instagram.com/juanito_827/?hl=es',
        ]);


        // Sandra Villacís

        SocialLink::create([
            'id_can_soc' => 4,
            'id_icon_soc' => 1,
            'platform_soc' => 'Facebook',
            'url_soc' => 'https://www.facebook.com/sandra.v.valencia.73?locale=es_LA',
        ]);

        SocialLink::create([
            'id_can_soc' => 4,
            'id_icon_soc' => 2,
            'platform_soc' => 'Instagram',
            'url_soc' => 'https://www.instagram.com/sandra_villacis_v/?hl=es',
        ]);


        // El ultimo registro que no esta asociado a nada, pero si lo borro tambien toca cambiar 
        // otras partes de sus codigos
        SocialLink::create([
            'id_can_soc' => 5,
            'id_icon_soc' => 1,
            'platform_soc' => 'Facebook',
            'url_soc' => 'https://www.facebook.com/sandra.v.valencia.73?locale=es_LA',
        ]);

        SocialLink::create([
            'id_can_soc' => 5,
            'id_icon_soc' => 2,
            'platform_soc' => 'Instagram',
            'url_soc' => 'https://www.instagram.com/sandra_villacis_v/?hl=es',
        ]);
    }
}
