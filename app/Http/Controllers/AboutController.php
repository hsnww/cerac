<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\Models\AboutPage;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        $about = AboutPage::with(['features' => function ($q) {
            $q->orderBy('sort_order');
        }])->first();

        return view('about', compact('settings', 'about'));
    }
}
