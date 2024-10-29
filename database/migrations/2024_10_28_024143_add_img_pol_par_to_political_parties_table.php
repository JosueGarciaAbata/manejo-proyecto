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
        Schema::table('political_parties', function (Blueprint $table) {
            Schema::table('political_parties', function (Blueprint $table) {
                $table->string('img_pol_par')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('political_parties', function (Blueprint $table) {
            $table->dropColumn('img_pol_par'); // Elimina la columna en caso de revertir la migración
        });
    }
};
