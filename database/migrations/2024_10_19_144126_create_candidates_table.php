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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id('id_can'); // Primary key
            $table->string('nom_can', 100)->notNullable();
            $table->string('ape_can', 100)->notNullable();

            $validPositions = ['Rector', 'Vicerrector Académico', 'Vicerrector de Investigación', 'Vicerrector Administrativo'];
            $table->enum('car_can', $validPositions)->notNullable();

            $table->date('fec_ing_can')->notNullable();

            $table->unsignedBigInteger('id_pol_par_bel')->notNullable();

            $table->foreign('id_pol_par_bel')
                ->references('id_lis')
                ->on('political_parties')
                ->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};
