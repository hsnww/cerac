<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;
use App\Models\HeroSlide;
use App\Models\Product;
use App\Models\Client;
use App\Models\Partner;
use App\Models\Project;

class HomeController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        $heroSlides = HeroSlide::active()->ordered()->get();
        $products = Product::active()->ordered()->take(6)->get();
        $clients = Client::active()->ordered()->get();
        $partners = Partner::active()->ordered()->get();
        $featuredProjects = Project::with('client')->active()->featured()->ordered()->take(3)->get();

        return view('home', compact(
            'settings',
            'heroSlides', 
            'products',
            'clients',
            'partners',
            'featuredProjects'
        ));
    }
}

