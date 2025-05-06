<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CartController extends Controller
{
    

    public function addToCart(Request $request)
    {
        // Get the medicine by its ID using DB
        $medicine = DB::table('medicines')->where('id', $request->id)->first();
    
        // If the medicine doesn't exist, return an error message
        if (!$medicine) {
            return redirect()->back()->with('error', 'Medicine not found!');
        }
    
        // Get the current cart from the session (or create an empty array if it doesn't exist)
        $cart = session()->get('cart', []);
    
        // Check if the medicine is already in the cart
        if (isset($cart[$medicine->id])) {
            // If the medicine is in the cart, increment the quantity by 1
            $cart[$medicine->id]->quantity++;
        } else {
            // If the medicine is not in the cart, add it with a quantity of 1
            $cart[$medicine->id] = (object)[
                'id' => $medicine->id,
                'name' => $medicine->name,
                'price' => $medicine->price,
                'quantity' => 1
            ];
        }
    
        // Save the updated cart to the session
        session()->put('cart', $cart);
    
        // Recalculate the total price of the cart
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item->price * $item->quantity;  // Access properties as object
        }
    
        // Optionally, you can also store the total price back in the session or do other cart-related actions here.
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Medicine added to cart!');
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);
        $action = $request->input('action');
        $key = str_replace(['increase_', 'decrease_'], '', $action); // Extract key
    
        if (isset($cart[$key])) {
            // If action is increase, increase quantity
            if (strpos($action, 'increase_') !== false) {
                $cart[$key]->quantity++;
            }
            // If action is decrease, decrease quantity but not below 1
            elseif (strpos($action, 'decrease_') !== false) {
                if ($cart[$key]->quantity > 1) {
                    $cart[$key]->quantity--;
                } else {
                    // Optionally, you can remove the item when quantity is 0
                    unset($cart[$key]);
                }
            }
        }
    
        // Update the cart in the session
        session()->put('cart', $cart);
    
        // Optionally, redirect back with a success message
        return redirect()->route('cart.index');
    }
    

public function confirmCart(Request $request)
{
    $cart = session()->get('cart');
    
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
    }

    // Calculate the total price
    $totalPrice = 0;
    foreach ($cart as $item) {
        $totalPrice += $item->price * $item->quantity;
    }

    // Create a new cart entry in the database (assuming you have a `Cart` model)
    DB::table('carts')->insert([
        'email' => session('patient')->email,  // Or use session('email') if it's stored elsewhere
        'medicines' => json_encode($cart), // Store cart items as JSON
        'total_price' => $totalPrice,
        'location' => $request->input('location'),
        'confirmed' => 'no', // Set to 'no' initially
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // Clear the cart from the session
    session()->forget('cart');

    return redirect()->route('cart.index')->with('success', 'Order confirmed!');
}

    
      
    

}
