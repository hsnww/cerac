<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HomePageSetting;

class HomePageSettingSeeder extends Seeder
{
    public function run(): void
    {
        HomePageSetting::query()->delete();

        HomePageSetting::create([
            'show_hero' => true,
            'show_cta' => true,
            'show_products' => true,
            'show_partners' => true,
            'show_projects' => true,
            'show_clients' => true,
            'show_contact_teaser' => true,

            'order_hero' => 1,
            'order_cta' => 2,
            'order_products' => 3,
            'order_partners' => 4,
            'order_projects' => 5,
            'order_clients' => 6,
            'order_contact_teaser' => 7,
        ]);
    }
}


