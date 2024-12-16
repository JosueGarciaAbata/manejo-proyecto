<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Usuario Administrador',
                'email' => 'admin@example.com',
                'username' => 'admin',
                'password' => Hash::make('password'),
                'type' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Usuario Normalr',
                'email' => 'user@example.com',
                'username' => 'user',
                'password' => Hash::make('password'),
                'type' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}