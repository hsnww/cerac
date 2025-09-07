<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'projects';

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'video_url',
        'location_text',
        'latitude',
        'longitude',
        'client_id',
        'is_featured',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
            
        $this->addMediaCollection('gallery')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('cover_image');
    }
    
    public function getGalleryImagesAttribute()
    {
        return $this->getMedia('gallery');
    }

    // Accessor for backward compatibility
    public function getLocationArAttribute()
    {
        return $this->location_text;
    }

    public function getLocationEnAttribute()
    {
        return $this->location_text;
    }
}
