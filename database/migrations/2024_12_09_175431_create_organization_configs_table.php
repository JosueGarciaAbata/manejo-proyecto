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
            $table->string('icon_path')->nullable();
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('representative')->nullable();
            $table->json('main_proposals')->nullable();
            $table->text('footer_text')->nullable();
            $table->json('social_icons')->nullable(); 
            $table->json('contact_info')->nullable();             $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_configs');
    }
};
