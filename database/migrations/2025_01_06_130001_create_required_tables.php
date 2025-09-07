<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Hero Slides
        if (!Schema::hasTable('hero_slides')) {
            Schema::create('hero_slides', function (Blueprint $table) {
                $table->id();
                $table->string('title_ar');
                $table->string('title_en')->nullable();
                $table->string('subtitle_ar')->nullable();
                $table->string('subtitle_en')->nullable();
                $table->text('description_ar')->nullable();
                $table->text('description_en')->nullable();
                $table->string('button_text_ar')->nullable();
                $table->string('button_text_en')->nullable();
                $table->string('button_url')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }

        // Products
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name_ar');
                $table->string('name_en')->nullable();
                $table->text('description_ar')->nullable();
                $table->text('description_en')->nullable();
                $table->json('features_ar')->nullable();
                $table->json('features_en')->nullable();
                $table->json('specifications_ar')->nullable();
                $table->json('specifications_en')->nullable();
                $table->decimal('price', 10, 2)->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }

        // Clients
        if (!Schema::hasTable('clients')) {
            Schema::create('clients', function (Blueprint $table) {
                $table->id();
                $table->string('name_ar');
                $table->string('name_en')->nullable();
                $table->text('description_ar')->nullable();
                $table->text('description_en')->nullable();
                $table->string('website_url')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }

        // Partners
        if (!Schema::hasTable('partners')) {
            Schema::create('partners', function (Blueprint $table) {
                $table->id();
                $table->string('name_ar');
                $table->string('name_en')->nullable();
                $table->text('description_ar')->nullable();
                $table->text('description_en')->nullable();
                $table->string('website_url')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }

        // Projects
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->id();
                $table->string('title_ar');
                $table->string('title_en')->nullable();
                $table->text('description_ar')->nullable();
                $table->text('description_en')->nullable();
                $table->foreignId('client_id')->nullable()->constrained()->onDelete('set null');
                $table->string('project_type')->nullable();
                $table->string('location_ar')->nullable();
                $table->string('location_en')->nullable();
                $table->date('start_date')->nullable();
                $table->date('end_date')->nullable();
                $table->boolean('is_featured')->default(false);
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }

        // Popups
        if (!Schema::hasTable('popups')) {
            Schema::create('popups', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->enum('type', ['poster', 'video', 'youtube', 'form', 'survey', 'custom'])->default('poster');
                $table->text('content')->nullable();
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
                $table->enum('position', ['center', 'top', 'bottom', 'left', 'right'])->default('center');
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->integer('display_count')->default(0);
                $table->timestamp('starts_at')->nullable();
                $table->timestamp('ends_at')->nullable();
                $table->timestamps();
            });
        }

        // Media table for Spatie Media Library
        if (!Schema::hasTable('media')) {
            Schema::create('media', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->morphs('model');
                $table->uuid('uuid')->nullable()->unique();
                $table->string('collection_name');
                $table->string('name');
                $table->string('file_name');
                $table->string('mime_type')->nullable();
                $table->string('disk');
                $table->string('conversions_disk')->nullable();
                $table->unsignedBigInteger('size');
                $table->json('manipulations');
                $table->json('custom_properties');
                $table->json('generated_conversions');
                $table->json('responsive_images');
                $table->unsignedInteger('order_column')->nullable();
                $table->nullableTimestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
        Schema::dropIfExists('popups');
        Schema::dropIfExists('projects');
        Schema::dropIfExists('partners');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('products');
        Schema::dropIfExists('hero_slides');
    }
};


