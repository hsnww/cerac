<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        $products = Product::with('media')->get();
        return view('products.index', compact('products', 'settings'));
    }

    public function show(Product $product)
    {
        $settings = SiteSetting::getSettings();
        $product->load('media');
        
        // Get related products (same category or random products)
        $relatedProducts = Product::with('media')
            ->active()
            ->where('id', '!=', $product->id)
            ->ordered()
            ->take(3)
            ->get();
        
        return view('products.show', compact('product', 'relatedProducts', 'settings'));
    }
}
