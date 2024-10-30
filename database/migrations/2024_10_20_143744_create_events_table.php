<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
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
            $table->text('des_eve');
            $table->dateTime("fec_pub_eve");
            $table->dateTime("fec_ini_eve");
            $table->dateTime("fec_fin_eve");
            $table->string("tag_eve", 50);
            $table->string("pre_img", 100);
            $table->string("res_img", 100);
            $table->string("dir_eve", 255);

            $table->softDeletes(); 
            $table->timestamps();
        });
        
        DB::statement('ALTER TABLE events ADD CONSTRAINT chk_fec_ini_fin CHECK (fec_ini_eve < fec_fin_eve)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
