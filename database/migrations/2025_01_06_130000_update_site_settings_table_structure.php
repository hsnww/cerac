<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Check if table exists and has the old structure
        if (Schema::hasTable('site_settings')) {
            // Add missing columns if they don't exist
            Schema::table('site_settings', function (Blueprint $table) {
                if (!Schema::hasColumn('site_settings', 'logo_url')) {
                    $table->string('logo_url')->nullable()->after('site_description');
                }
                if (!Schema::hasColumn('site_settings', 'favicon_url')) {
                    $table->string('favicon_url')->nullable()->after('logo_url');
                }
                if (!Schema::hasColumn('site_settings', 'phone')) {
                    $table->string('phone')->nullable()->after('favicon_url');
                }
                if (!Schema::hasColumn('site_settings', 'email')) {
                    $table->string('email')->nullable()->after('phone');
                }
                if (!Schema::hasColumn('site_settings', 'address')) {
                    $table->text('address')->nullable()->after('email');
                }
                if (!Schema::hasColumn('site_settings', 'working_hours')) {
                    $table->text('working_hours')->nullable()->after('address');
                }
                if (!Schema::hasColumn('site_settings', 'is_active')) {
                    $table->boolean('is_active')->default(true)->after('working_hours');
                }
            });
        } else {
            // Create table with the correct structure
            Schema::create('site_settings', function (Blueprint $table) {
                $table->id();
                $table->string('site_name');
                $table->text('site_description')->nullable();
                $table->string('site_keywords')->nullable();
                $table->string('logo_url')->nullable();
                $table->string('favicon_url')->nullable();
                $table->string('contact_phone')->nullable();
                $table->string('phone')->nullable(); // Alias for contact_phone
                $table->string('contact_email')->nullable();
                $table->string('email')->nullable(); // Alias for contact_email
                $table->text('contact_address')->nullable();
                $table->text('address')->nullable(); // Alias for contact_address
                $table->string('facebook_url')->nullable();
                $table->string('twitter_url')->nullable();
                $table->string('linkedin_url')->nullable();
                $table->string('instagram_url')->nullable();
                $table->string('youtube_url')->nullable();
                $table->text('about_text')->nullable();
                $table->text('services_text')->nullable();
                $table->text('working_hours')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Don't drop the table, just remove added columns
        Schema::table('site_settings', function (Blueprint $table) {
            if (Schema::hasColumn('site_settings', 'logo_url')) {
                $table->dropColumn('logo_url');
            }
            if (Schema::hasColumn('site_settings', 'favicon_url')) {
                $table->dropColumn('favicon_url');
            }
            if (Schema::hasColumn('site_settings', 'phone')) {
                $table->dropColumn('phone');
            }
            if (Schema::hasColumn('site_settings', 'email')) {
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('site_settings', 'address')) {
                $table->dropColumn('address');
            }
            if (Schema::hasColumn('site_settings', 'working_hours')) {
                $table->dropColumn('working_hours');
            }
            if (Schema::hasColumn('site_settings', 'is_active')) {
                $table->dropColumn('is_active');
            }
        });
    }
};


