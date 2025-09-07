<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SiteSettingSeeder::class,
            ProductSeeder::class,
            PartnerSeeder::class,
            ClientSeeder::class,
            ProjectSeeder::class,
            HeroSlideSeeder::class,
            PopupSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            MediaSeeder::class,
        ]);
    }
}