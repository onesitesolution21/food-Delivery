<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function products()
    {
        $categories = Category::all();

        $products = Product::paginate(10);

        return view('frontend.shop', compact('categories', 'products'));
    }

    public function productDetails($slug)
    {
        $categories = Category::all();
        $products = Product::all();

        $product = Product::where('slug', $slug)->firstOrFail();

        return view('frontend.product-details', compact('categories', 'product', 'products'));
    }
}
