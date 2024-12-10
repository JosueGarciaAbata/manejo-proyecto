<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('organization_social_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('organization_config_id')
                ->constrained('organization_configs')
                ->onDelete('cascade');
            $table->foreignId('icon_id')
                ->nullable()
                ->constrained('icons', 'id_icon')
                ->onDelete('set null');
            $table->string('platform');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('organization_social_links');
    }
};
