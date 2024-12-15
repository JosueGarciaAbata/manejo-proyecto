<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesional_experiences', function (Blueprint $table) {
            $table->id('id_exp');
            $table->foreignId('id_can_exp')->constrained('candidates', 'id_can')->onDelete('cascade');
            // $table->string('pos_exp', 180)->notNullable();
            $table->string('nom_exp', 180)->notNullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesional_experiences');
    }
};
