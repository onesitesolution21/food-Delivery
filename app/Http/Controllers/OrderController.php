<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //dd( $request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'postcode' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'ordernotes' => 'nullable|string',
            'payment_method' => 'required|string|in:Payments,Delivery',
        ],
        [
            'firstname.required' => 'First name is required.',
            'lastname.required' => 'Last name is required.',
            'address.required' => 'Address is required.',
            'city.required' => 'City is required.',
            'state.required' => 'State is required.',
            'country.required' => 'Country is required.',
            'postcode.required' => 'Postcode/Zip is required.',
            'phone.required' => 'Phone number is required.',
            'email.required' => 'Email address is required.',
            'payment_method.required' => 'Payment method is required.',
        ]);

        try {
            // Create a new order using the validated data
            $order = new Order();
            $order->user_id = auth()->id();
            $order->firstname = $validatedData['firstname'];
            $order->lastname = $validatedData['lastname'];
            $order->address = $validatedData['address'];
            $order->city = $validatedData['city'];
            $order->state = $validatedData['state'];
            $order->country = $validatedData['country'];
            $order->postcode = $validatedData['postcode'];
            $order->phone = $validatedData['phone'];
            $order->email = $validatedData['email'];
            $order->payment_method = $validatedData['payment_method'];
            $order->ordernotes = $validatedData['ordernotes'] ?? null;
            $order->total_amount = filterField(Cart::total());
            $order->save();

            if ($order) {
                foreach (Cart::content() as $item) {
                    $order->items()->create([
                        'user_id' => auth()->id(),
                        'product_id' => $item->id,
                        'quantity' => $item->qty,
                        'total_amount' => $item->subtotal,
                        'price' => $item->price,
                    ]);
                }
                    
                Cart::destroy();
            }

            return redirect()->route('buyer.dashboard')->with('success', 'Your order has been placed successfully!');
        }
        catch (\Exception $e) {

            return redirect()->back()->with('error', 'An error occurred while placing your order. Please try again.');
        }
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
}
