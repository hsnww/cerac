<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        
        return view('about', compact('settings'));
    }
}
