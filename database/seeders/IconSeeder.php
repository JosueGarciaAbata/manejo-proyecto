<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Icon;

class IconSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Icon::create([
            'id_icon' => 1,
            'name_icon' => 'Facebook',
            'path_icon' => 'assets/icons/facebook.svg'
        ]);

        Icon::create([
            'id_icon' => 2,
            'name_icon' => 'Instagram',
            'path_icon' => 'assets/icons/instagram.svg'
        ]);
    }
}
