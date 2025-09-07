<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// Projects pages
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Products pages
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Popup API routes
Route::get('/api/popups/active', function () {
    $popups = \App\Models\Popup::currentlyActive()
        ->ordered()
        ->get()
        ->map(function ($popup) {
            return [
                'id' => $popup->id,
                'title' => $popup->title,
                'type' => $popup->type,
                'content' => $popup->content,
                'image_url' => $popup->image_url,
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
});

Route::post('/api/popups/{popup}/increment', function (\App\Models\Popup $popup) {
    $popup->incrementDisplayCount();
    return response()->json(['success' => true]);
});
