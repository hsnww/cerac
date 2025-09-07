<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Artisan;

return new class extends Migration
{
    public function up(): void
    {
        // Run seeders
        Artisan::call('db:seed', ['--class' => 'SiteSettingSeeder']);
        Artisan::call('db:seed', ['--class' => 'HeroSlideSeeder']);
        Artisan::call('db:seed', ['--class' => 'ProductSeeder']);
        Artisan::call('db:seed', ['--class' => 'ClientSeeder']);
        Artisan::call('db:seed', ['--class' => 'PartnerSeeder']);
        Artisan::call('db:seed', ['--class' => 'ProjectSeeder']);
        Artisan::call('db:seed', ['--class' => 'PopupSeeder']);
    }

    public function down(): void
    {
        // This migration cannot be rolled back
    }
};


