<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('political_parties', function (Blueprint $table) {
            $table->id('id_lis'); // Primary Key
            $table->string('nom_lis', 100)->notNullable();
            $table->text('des_lis')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        DB::statement("
            ALTER TABLE political_parties 
            ADD CONSTRAINT check_nom_lis_alnum 
            CHECK (nom_lis REGEXP '^[a-zA-Z0-9 ]+$')
        ");            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('political_parties');
    }
};
