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
        Schema::create('popups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('type')->default('poster');
            $table->text('content')->nullable();
            $table->string('image_url')->nullable();
            $table->string('video_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('form_action')->nullable();
            $table->json('form_fields')->nullable();
            $table->string('button_text')->default('إغلاق');
            $table->string('button_url')->nullable();
            $table->boolean('show_close_button')->default(true);
            $table->boolean('auto_close')->default(false);
            $table->integer('auto_close_delay')->nullable();
            $table->boolean('show_once_per_session')->default(true);
            $table->json('display_rules')->nullable();
            $table->integer('width')->default(800);
            $table->integer('height')->default(600);
            $table->string('position')->default('center');
            $table->boolean('is_active')->default(false);
            $table->integer('sort_order')->default(0);
            $table->integer('display_count')->default(0);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('popups');
    }
};
