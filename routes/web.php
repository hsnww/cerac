<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PopupController;

// Home page
Route::get('/', [HomeController::class, 'index'])->name('home');

// About page
Route::get('/about', [AboutController::class, 'index'])->name('about');

// Projects pages
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

// Products pages
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// Contact page
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Popup routes
Route::get('/popups/active', [PopupController::class, 'getActivePopups']);
Route::post('/popups/{popup}/increment', [PopupController::class, 'incrementDisplayCount']);

// Debug and test routes
Route::get('/test-popup', [PopupController::class, 'createTestPopup']);
Route::get('/debug-popups', [PopupController::class, 'debugPopups']);
Route::get('/force-popup', [PopupController::class, 'createTestPopup']);
Route::get('/activate-popup', [PopupController::class, 'activatePopup']);
Route::get('/activate-video-popup', [PopupController::class, 'activateVideoPopup']);
Route::get('/test-all-popups', [PopupController::class, 'testAllPopups']);
Route::get('/check-active-popups', [PopupController::class, 'checkActivePopups']);
