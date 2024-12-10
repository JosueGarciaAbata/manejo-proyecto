<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_contact_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_config_id')->constrained('organization_configs')->onDelete('cascade');
            $table->string('type'); // (e.g., email, phone)
            $table->string('value'); // Valor del contacto (e.g., dirección de correo)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_contact_details');
    }
};
