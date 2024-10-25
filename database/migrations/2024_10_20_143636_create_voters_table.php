<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id('id_vot');
            $table->string('nom_vot', 25)->nullable();
            $table->string('ape_vot', 25)->nullable();
            $table->string('ema_vot')->unique();
            // primero permitir que sea nulo y luego aplicar restriccion
            $table->foreignId('id_lis_vot')
                  ->nullable()
                  ->constrained('political_parties', 'id_lis')
                  ->onDelete("cascade");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
