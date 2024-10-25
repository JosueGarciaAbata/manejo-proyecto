<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vote_statistics', function (Blueprint $table) {
            $table->id("id_vot_sta");
            $table->foreign('id_pol_par_sta')
                ->references('id_lis')
                ->on('political_parties')
                ->onDelete('cascade');
            $table->integer("num_vot_sta")->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vote_statistics');
    }
};
