<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\HeroSlide;
use App\Models\Product;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Project;
use App\Models\HomePageSetting;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        $heroSlides = HeroSlide::active()->ordered()->get();
        $products = Product::active()->ordered()->take(6)->get();
        $clients = Client::active()->ordered()->get();
        $partners = Partner::active()->ordered()->get();
        $projects = Project::with('client')->active()->featured()->ordered()->take(6)->get();

        $homeSettings = HomePageSetting::getSettings();
        $homeSections = collect([
            ['key' => 'hero', 'show' => $homeSettings->show_hero, 'order' => $homeSettings->order_hero],
            ['key' => 'cta', 'show' => $homeSettings->show_cta, 'order' => $homeSettings->order_cta],
            ['key' => 'products', 'show' => $homeSettings->show_products, 'order' => $homeSettings->order_products],
            ['key' => 'partners', 'show' => $homeSettings->show_partners, 'order' => $homeSettings->order_partners],
            ['key' => 'projects', 'show' => $homeSettings->show_projects, 'order' => $homeSettings->order_projects],
            ['key' => 'clients', 'show' => $homeSettings->show_clients, 'order' => $homeSettings->order_clients],
            ['key' => 'contact', 'show' => $homeSettings->show_contact_teaser, 'order' => $homeSettings->order_contact_teaser],
        ])->where('show', true)->sortBy('order')->values();

        return view('home', compact(
            'settings',
            'heroSlides', 
            'products',
            'clients',
            'partners',
            'projects',
            'homeSettings',
            'homeSections'
        ));
    }
}

