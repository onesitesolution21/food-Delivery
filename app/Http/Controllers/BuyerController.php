<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $orders = [];
        if (auth()->check()) {
            $orders = auth()->user()
                ->orders()
                ->with('items.product')
                ->latest()
                ->take(5)
                ->get();
        }

        return view('user.user-dashboard', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function orders()
    {
        $orders = [];
        if (auth()->check()) {
            $orders = auth()->user()->orders()->with('items.product')->latest()->get();
        }

        return view('user.orders', compact( 'orders'));
    }
}
