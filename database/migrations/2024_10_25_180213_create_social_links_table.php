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
        Schema::create('social_links', function (Blueprint $table) {
            $table->id('id_soc');
            $table->foreignId('id_can_soc')->constrained('candidates', 'id_can')->onDelete('cascade');
            $table->foreignId('id_icon_soc')->constrained('icons', 'id_icon')->onDelete('cascade');
            $table->string('platform_soc');
            $table->string('url_soc');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
};
