<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'clients';

    protected $fillable = [
        'name_ar',
        'name_en',
        'website_url',
        'is_featured',
        'is_active',
        'sort_order'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
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
        $this->addMediaCollection('logo')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml']);
    }

    public function getLogoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('logo');
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    // Accessor for backward compatibility
    public function getNameArAttribute()
    {
        return $this->attributes['name_ar'];
    }

    public function getNameEnAttribute()
    {
        return $this->attributes['name_en'];
    }
}
