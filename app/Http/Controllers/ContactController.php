<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteSetting;

class ContactController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        
        return view('contact', compact('settings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Here you can add email sending logic
        // For now, we'll just return success
        
        return redirect()->back()->with('success', 'تم إرسال رسالتك بنجاح. سنتواصل معك قريباً.');
    }
}




