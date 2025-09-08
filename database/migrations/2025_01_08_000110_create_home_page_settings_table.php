<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();

            $table->boolean('show_hero')->default(true);
            $table->boolean('show_cta')->default(true);
            $table->boolean('show_products')->default(true);
            $table->boolean('show_partners')->default(true);
            $table->boolean('show_projects')->default(true);
            $table->boolean('show_clients')->default(true);
            $table->boolean('show_contact_teaser')->default(true);

            $table->unsignedSmallInteger('order_hero')->default(1);
            $table->unsignedSmallInteger('order_cta')->default(2);
            $table->unsignedSmallInteger('order_products')->default(3);
            $table->unsignedSmallInteger('order_partners')->default(4);
            $table->unsignedSmallInteger('order_projects')->default(5);
            $table->unsignedSmallInteger('order_clients')->default(6);
            $table->unsignedSmallInteger('order_contact_teaser')->default(7);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};


