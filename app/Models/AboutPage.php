<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AboutPage extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_bg_color',
        'hero_text_color',
        'about_title',
        'about_paragraph_1',
        'about_paragraph_2',
        'mission_title',
        'mission_text',
        'vision_title',
        'vision_text',
        'cta_title',
        'cta_text',
        'cta_primary_text',
        'cta_primary_url',
        'cta_secondary_text',
        'cta_secondary_url',
    ];

    public function features(): HasMany
    {
        return $this->hasMany(AboutFeature::class)->orderBy('sort_order');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_main_image')->singleFile();
    }
}


