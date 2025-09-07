<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SiteSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'site_settings';

    protected $fillable = [
        'site_name',
        'site_description',
        'site_keywords',
        'contact_phone',
        'contact_email',
        'contact_address',
        'facebook_url',
        'twitter_url',
        'linkedin_url',
        'instagram_url',
        'youtube_url',
        'about_text',
        'services_text'
    ];

    protected $casts = [
        'site_keywords' => 'array',
    ];

    public static function getSettings()
    {
        return static::first() ?? new static([
            'site_name' => 'سيراك',
            'site_description' => 'مصنع مستقبل الغراء',
            'contact_phone' => '+966 50 123 4567',
            'contact_email' => 'info@cerac.com',
            'contact_address' => 'الرياض، المملكة العربية السعودية'
        ]);
    }

    // Accessors for backward compatibility
    public function getPhoneAttribute()
    {
        return $this->contact_phone;
    }

    public function getEmailAttribute()
    {
        return $this->contact_email;
    }

    public function getAddressAttribute()
    {
        return $this->contact_address;
    }

    public function getLogoUrlAttribute()
    {
        return $this->getFirstMediaUrl('logo');
    }

    public function getLogoLightUrlAttribute()
    {
        return $this->getFirstMediaUrl('logo_light');
    }

    public function getFaviconUrlAttribute()
    {
        return null; // Will be handled by Spatie Media Library
    }

    public function getWorkingHoursAttribute()
    {
        return 'السبت - الخميس: 8:00 ص - 6:00 م';
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('logo')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml']);

        $this->addMediaCollection('logo_light')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml']);

        $this->addMediaCollection('favicon')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/x-icon', 'image/vnd.microsoft.icon', 'image/png']);
    }
}
