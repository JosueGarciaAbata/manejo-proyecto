<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Crear la tabla 'users'
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('picture')->nullable();
            $table->integer('type')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        // Insertar un usuario admin por defecto
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'username' => 'admin',
            'picture' => null,
            'type' => 1, // Tipo 1 para admin
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'usuario Normal',
            'email' => 'admin1@example.com',
            'password' => Hash::make('admin1'),
            'username' => 'admin1',
            'picture' => null,
            'type' => 2, // Tipo 1 para admin
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Eliminar la tabla 'users'
        Schema::dropIfExists('users');
    }
};