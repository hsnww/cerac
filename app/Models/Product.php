<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'products';

    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
        'features_ar',
        'features_en',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'features_ar' => 'array',
        'features_en' => 'array',
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
        $this->addMediaCollection('product_image')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_image');
    }

    // Accessor for backward compatibility
    public function getNameArAttribute()
    {
        return $this->attributes['title_ar'];
    }

    public function getNameEnAttribute()
    {
        return $this->attributes['title_en'];
    }
}
