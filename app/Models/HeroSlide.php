<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class HeroSlide extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'hero_slides';

    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'button_text',
        'button_url',
        'button_text_2',
        'button_url_2',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('hero_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('hero_image');
    }

    // Accessor for backward compatibility
    public function getTitleArAttribute()
    {
        return $this->attributes['title'];
    }

    public function getSubtitleArAttribute()
    {
        return $this->attributes['subtitle'];
    }

    public function getDescriptionArAttribute()
    {
        return $this->attributes['description'];
    }

    public function getButtonTextArAttribute()
    {
        return $this->attributes['button_text'];
    }
}
