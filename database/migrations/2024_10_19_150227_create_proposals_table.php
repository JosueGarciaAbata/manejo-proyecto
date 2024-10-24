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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id('id_pro');//Primary Key
            $table->string('tit_pro', 255);
            $table->text('des_pro'); 
            $table->date('fec_inc_pro'); 
            $table->string('tags_pro', 500);
            $table->string('img_pro')->nullable();
            $table->foreignId('id_can_pro')
                  ->constrained('candidates', 'id_can')
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
        Schema::dropIfExists('proposals');
    }
};
