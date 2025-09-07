<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('media')->get();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $product->load('media');
        return view('products.show', compact('product'));
    }
}
