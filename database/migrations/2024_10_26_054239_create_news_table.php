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
        Schema::create('news', function (Blueprint $table) {
            $table->id('id_new');
            $table->string('tit_new', 100);
            $table->text('des_new');
            $table->dateTime("fec_pub_new");
            $table->string("tag_new", 100);
            $table->string("pre_img", 100);
            $table->string("res_img", 100);
            
            $table->softDeletes(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
