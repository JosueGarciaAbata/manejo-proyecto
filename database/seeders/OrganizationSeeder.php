<?php

namespace Database\Seeders;

use App\Models\OrganizationConfig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        OrganizationConfig::create([
            'slogan' => 'Trabajemos Juntos Por Una Mejor Universidad Técnica de Ambato',
            'icon_path' => 'images/icons/logo.png',
            'representative' => 'Juan Pérez',
            'main_proposals' => ['Mejorar la eficiencia energética', 'Fomentar la inclusión digital', 'Reducir el impacto ambiental'],
            'footer_text' => '© 2024 Organización Ejemplo. Todos los derechos reservados.',
            'social_icons' => [
                ['platform' => 'facebook', 'url' => 'https://facebook.com/org'],
                ['platform' => 'twitter', 'url' => 'https://twitter.com/org'],
                ['platform' => 'linkedin', 'url' => 'https://linkedin.com/org']
            ],
            'contact_info' => [
                'email' => 'contacto@ejemplo.com',
                'phone' => '+52 123 456 7890',
                'address' => 'Calle Ejemplo #123, Ciudad, País'
            ]
        ]);
    }
}
