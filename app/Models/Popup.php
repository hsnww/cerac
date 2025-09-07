<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Popup extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'type',
        'content',
        'image_url',
        'video_url',
        'youtube_url',
        'form_action',
        'form_fields',
        'button_text',
        'button_url',
        'show_close_button',
        'auto_close',
        'auto_close_delay',
        'show_once_per_session',
        'display_rules',
        'width',
        'height',
        'position',
        'is_active',
        'sort_order',
        'display_count',
        'starts_at',
        'ends_at'
    ];

    protected $casts = [
        'form_fields' => 'array',
        'display_rules' => 'array',
        'show_close_button' => 'boolean',
        'auto_close' => 'boolean',
        'show_once_per_session' => 'boolean',
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeCurrentlyActive($query)
    {
        $now = Carbon::now();
        return $query->where('is_active', true)
            ->where(function ($q) use ($now) {
                $q->whereNull('starts_at')
                  ->orWhere('starts_at', '<=', $now);
            })
            ->where(function ($q) use ($now) {
                $q->whereNull('ends_at')
                  ->orWhere('ends_at', '>=', $now);
            });
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at', 'desc');
    }

    public function incrementDisplayCount()
    {
        $this->increment('display_count');
    }

    public function isCurrentlyActive()
    {
        if (!$this->is_active) {
            return false;
        }

        $now = Carbon::now();

        if ($this->starts_at && $this->starts_at->gt($now)) {
            return false;
        }

        if ($this->ends_at && $this->ends_at->lt($now)) {
            return false;
        }

        return true;
    }

    public function getYoutubeEmbedUrl()
    {
        if (!$this->youtube_url) {
            return null;
        }

        // Extract video ID from various YouTube URL formats
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/';
        preg_match($pattern, $this->youtube_url, $matches);
        
        if (isset($matches[1])) {
            return 'https://www.youtube.com/embed/' . $matches[1];
        }

        return null;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('popup_images')
            ->useDisk('public')
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    public function getImageUrlAttribute(): ?string
    {
        // First try to get from Spatie Media Library
        $mediaUrl = $this->getFirstMediaUrl('popup_images');
        if ($mediaUrl) {
            return $mediaUrl;
        }
        
        // Fallback to direct image_url field
        return $this->attributes['image_url'] ?? null;
    }
}
