<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            // Hero
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->string('hero_bg_color')->default('#1cabe3');
            $table->string('hero_text_color')->default('#0e183c');
            // About content
            $table->string('about_title')->nullable();
            $table->text('about_paragraph_1')->nullable();
            $table->text('about_paragraph_2')->nullable();
            // Mission & Vision
            $table->string('mission_title')->nullable();
            $table->text('mission_text')->nullable();
            $table->string('vision_title')->nullable();
            $table->text('vision_text')->nullable();
            // CTA
            $table->string('cta_title')->nullable();
            $table->text('cta_text')->nullable();
            $table->string('cta_primary_text')->nullable();
            $table->string('cta_primary_url')->nullable();
            $table->string('cta_secondary_text')->nullable();
            $table->string('cta_secondary_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};


