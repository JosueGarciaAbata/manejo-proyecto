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
        Schema::create('events', function (Blueprint $table) {
            $table->id('id_eve');
            $table->string('tit_eve', 50);
            $table->string('des_eve', 150);
            $table->dateTime("fec_pub_eve");
            $table->dateTime("fec_eve");
            $table->string("tag_eve", 50);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
