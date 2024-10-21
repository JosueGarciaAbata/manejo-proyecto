<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PoliticalParty;

class PoliticalPartiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PoliticalParty::create([
            'nom_lis' => 'Lista A',
            'des_lis' => 'Descripción de la lista A',
        ]);

        PoliticalParty::create([
            'nom_lis' => 'Lista B',
            'des_lis' => 'Descripción de la lista B',
        ]);
    }
}
