<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('about_page_id')->constrained('about_pages')->cascadeOnDelete();
            $table->string('title');
            $table->string('text');
            $table->enum('icon_type', ['heroicon', 'media'])->default('heroicon');
            $table->string('heroicon_name')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_features');
    }
};


