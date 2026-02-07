<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        return view('frontend.index', compact( 'products'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function checkout()
    {
        if (Cart::count() == 0) {
            return redirect()->route('frontend.shop')->with('info', 'Your cart is empty. Please add some products to proceed to checkout.');
        }

        if (!auth()->check()) {
            return redirect()->route('login')->with('warning', 'Please log in to proceed to checkout.');
        }

        return view('frontend.checkout');
    }

    public function defaultError()
    {
        return view('errors.404');
    }
}
