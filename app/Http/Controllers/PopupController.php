<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function getActivePopups()
    {
        $popups = Popup::currentlyActive()
            ->ordered()
            ->get()
            ->map(function ($popup) {
                return [
                    'id' => $popup->id,
                    'title' => $popup->title,
                    'type' => $popup->type,
                    'content' => $popup->content,
                    'image_url' => $popup->getFirstMediaUrl('popup_images') ?: $popup->image_url,
                    'popup_images' => $popup->getMedia('popup_images')->map(fn($media) => [
                        'url' => $media->getUrl(),
                        'name' => $media->name,
                    ]),
                    'video_url' => $popup->video_url,
                    'youtube_url' => $popup->youtube_url,
                    'form_action' => $popup->form_action,
                    'form_fields' => $popup->form_fields,
                    'button_text' => $popup->button_text,
                    'button_url' => $popup->button_url,
                    'show_close_button' => $popup->show_close_button,
                    'auto_close' => $popup->auto_close,
                    'auto_close_delay' => $popup->auto_close_delay,
                    'show_once_per_session' => $popup->show_once_per_session,
                    'display_rules' => $popup->display_rules,
                    'width' => $popup->width,
                    'height' => $popup->height,
                    'position' => $popup->position,
                    'is_active' => $popup->is_active,
                    'starts_at' => $popup->starts_at,
                    'ends_at' => $popup->ends_at,
                ];
            });
        
        return response()->json($popups);
    }

    public function incrementDisplayCount(Popup $popup)
    {
        $popup->incrementDisplayCount();
        return response()->json(['success' => true]);
    }

    public function createTestPopup()
    {
        // Delete existing test popups
        Popup::where('title', 'LIKE', '%test%')->delete();
        
        $popup = Popup::create([
            'title' => 'Test Popup - مرحباً بكم',
            'type' => 'poster',
            'content' => 'اكتشفوا منتجاتنا المتميزة من الغراء والمواد اللاصقة عالية الجودة',
            'image_url' => null, // Will use Spatie Media Library image
            'button_text' => 'استكشف المنتجات',
            'button_url' => '#products',
            'show_close_button' => true,
            'auto_close' => false,
            'show_once_per_session' => false,
            'width' => 600,
            'height' => 400,
            'position' => 'center',
            'is_active' => true,
            'sort_order' => 1,
            'starts_at' => now()->subMinutes(1),
            'ends_at' => now()->addMonths(1),
        ]);
        
        return response()->json([
            'message' => 'Test popup created successfully',
            'popup' => $popup,
            'is_currently_active' => $popup->isCurrentlyActive(),
            'image_url' => $popup->image_url,
            'media_images' => $popup->getMedia('popup_images')->map(fn($media) => $media->getUrl())
        ]);
    }

    public function debugPopups()
    {
        $popups = Popup::currentlyActive()->get();
        return response()->json([
            'total_active' => $popups->count(),
            'popups' => $popups->map(function ($popup) {
                return [
                    'id' => $popup->id,
                    'title' => $popup->title,
                    'is_active' => $popup->is_active,
                    'starts_at' => $popup->starts_at,
                    'ends_at' => $popup->ends_at,
                    'is_currently_active' => $popup->isCurrentlyActive(),
                ];
            })
        ]);
    }

    public function activatePopup()
    {
        // Find popup with ID 1 (has image in database)
        $popup = Popup::find(1);
        
        if ($popup) {
            $popup->update([
                'is_active' => true,
                'starts_at' => now()->subMinutes(1),
                'ends_at' => now()->addMonths(1),
            ]);
            
            return response()->json([
                'message' => 'Popup activated successfully',
                'popup' => $popup,
                'is_currently_active' => $popup->isCurrentlyActive(),
                'image_url' => $popup->image_url,
                'media_images' => $popup->getMedia('popup_images')->map(fn($media) => $media->getUrl())
            ]);
        }
        
        return response()->json(['message' => 'Popup not found'], 404);
    }

    public function activateVideoPopup()
    {
        // Find popup with ID 2 (has YouTube video)
        $popup = Popup::find(2);
        
        if ($popup) {
            $popup->update([
                'is_active' => true,
                'starts_at' => now()->subMinutes(1),
                'ends_at' => now()->addMonths(1),
            ]);
            
            return response()->json([
                'message' => 'Video popup activated successfully',
                'popup' => $popup,
                'is_currently_active' => $popup->isCurrentlyActive(),
                'youtube_url' => $popup->youtube_url,
                'youtube_embed_url' => $popup->getYoutubeEmbedUrl()
            ]);
        }
        
        return response()->json(['message' => 'Video popup not found'], 404);
    }

    public function testAllPopups()
    {
        // Activate popup with image (ID: 1)
        $imagePopup = Popup::find(1);
        if ($imagePopup) {
            $imagePopup->update([
                'is_active' => true,
                'starts_at' => now()->subMinutes(1),
                'ends_at' => now()->addHours(1),
            ]);
        }

        // Activate popup with video (ID: 2) 
        $videoPopup = Popup::find(2);
        if ($videoPopup) {
            $videoPopup->update([
                'is_active' => true,
                'starts_at' => now()->subMinutes(1),
                'ends_at' => now()->addHours(1),
            ]);
        }

        // Get all active popups
        $activePopups = Popup::currentlyActive()->get();

        return response()->json([
            'message' => 'All test popups activated',
            'active_popups' => $activePopups->map(function($popup) {
                return [
                    'id' => $popup->id,
                    'title' => $popup->title,
                    'type' => $popup->type,
                    'is_active' => $popup->is_active,
                    'starts_at' => $popup->starts_at,
                    'ends_at' => $popup->ends_at,
                    'image_url' => $popup->getFirstMediaUrl('popup_images') ?: $popup->image_url,
                    'youtube_url' => $popup->youtube_url,
                ];
            })
        ]);
    }

    public function checkActivePopups()
    {
        $activePopups = Popup::where('is_active', 1)->get();
        $currentlyActive = Popup::currentlyActive()->get();
        
        return response()->json([
            'message' => 'Active popups check',
            'is_active_count' => $activePopups->count(),
            'currently_active_count' => $currentlyActive->count(),
            'is_active_popups' => $activePopups->map(function($popup) {
                return [
                    'id' => $popup->id,
                    'title' => $popup->title,
                    'type' => $popup->type,
                    'is_active' => $popup->is_active,
                    'starts_at' => $popup->starts_at,
                    'ends_at' => $popup->ends_at,
                ];
            }),
            'currently_active_popups' => $currentlyActive->map(function($popup) {
                return [
                    'id' => $popup->id,
                    'title' => $popup->title,
                    'type' => $popup->type,
                    'is_active' => $popup->is_active,
                    'starts_at' => $popup->starts_at,
                    'ends_at' => $popup->ends_at,
                ];
            })
        ]);
    }
}
