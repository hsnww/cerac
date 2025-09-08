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
        // الغلاف
        $this->addMediaCollection('product_cover')
            ->useDisk('public')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);

        // المعرض
        $this->addMediaCollection('product_gallery')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);

        // ملف المواصفات (PDF/Word)
        $this->addMediaCollection('product_spec_document')
            ->useDisk('public')
            ->acceptsMimeTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document']);
    }

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_cover')
            ?: $this->getFirstMediaUrl('product_gallery');
    }

    public function getCoverImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_cover');
    }

    public function getSpecDocumentUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('product_spec_document');
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
