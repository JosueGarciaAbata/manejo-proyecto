<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('types')->insert([
            ['name' => 'Administrador', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Usuario', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}