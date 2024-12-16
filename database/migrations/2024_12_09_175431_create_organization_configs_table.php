<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_configs', function (Blueprint $table) {
            $table->id();
            $table->string('slogan')->nullable();
            $table->string('icon')->nullable();
            //$table->text('mission')->nullable();
            // $table->text('vision')->nullable();
            $table->string('representant')->nullable();
            $table->text('footer_text')->nullable();
            $table->timestamps();
        });
        Schema::create('organization_config_proposals', function(Blueprint $table){
            $table->id();
            $table->foreignId("org_main_prop")->
            constrained('organization_configs')->
            onDelete('cascade');
            $table->foreignId('id_pro_prop')->
            constrained('proposals','id_pro');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_config_proposals');
        Schema::dropIfExists('organization_configs');
    }
};
