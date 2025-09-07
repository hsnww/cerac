<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\File;

return new class extends Migration
{
    public function up(): void
    {
        // Create storage directories
        $directories = [
            storage_path('app/public'),
            storage_path('app/public/hero_images'),
            storage_path('app/public/product_images'),
            storage_path('app/public/client_logos'),
            storage_path('app/public/partner_logos'),
            storage_path('app/public/project_images'),
            storage_path('app/public/popup_images'),
        ];

        foreach ($directories as $directory) {
            if (!File::exists($directory)) {
                File::makeDirectory($directory, 0755, true);
            }
        }

        // Create storage link
        if (!File::exists(public_path('storage'))) {
            File::link(storage_path('app/public'), public_path('storage'));
        }
    }

    public function down(): void
    {
        // Remove storage link
        if (File::exists(public_path('storage'))) {
            File::delete(public_path('storage'));
        }
    }
};


