<?php

namespace Database\Seeders;

use App\Models\OrganizationConfig;
use App\Models\OrganizationContactDetail;
use App\Models\OrganizationSocialLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function run(): void
    {
        OrganizationConfig::create([
            'slogan' => 'Trabajemos Juntos Por Una Mejor Universidad Técnica de Ambato',
            'icon' => 'images/icons/logo.png',
            'representant' => 'images/representatives/john_doe.png',
            'footer_text' => 'Sé parte del cambio en la Universidad Técnica de Ambato.',
        ]);
        
        // Agregar redes sociales
        OrganizationSocialLink::create([
            'organization_config_id' => 1,
            'icon_id'=>1,
            'platform' => 'Instagram',
            'url' => 'https://twitter.com/uta_org',
        ]);
        OrganizationSocialLink::create([
            'organization_config_id' => 1,
            'icon_id'=>2,
            'platform' => 'Facebook',
            'url' => 'https://facebook.com/uta_org',
        ]);
        
        // Agregar detalles de contacto
        OrganizationContactDetail::create([
            'organization_config_id' => 1,
            'type' => 'email',
            'value' => 'contacto@ejemplo.com',
        ]);
        OrganizationContactDetail::create([
            'organization_config_id' => 1,
            'type' => 'phone',
            'value' => '+52 123 456 7890',
        ]);
    }
}
