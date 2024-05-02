<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Method to show the cart
    public function index()
    {
        $cartItems = auth()->user()->cart()->with('product')->get();
        return view('cart.index', compact('cartItems'));
    }

    // Method to add an item to the cart
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $user = auth()->user();
        $cartItem = $user->cart()->where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $cartItem->update(['quantity' => $cartItem->quantity + $request->quantity]);
        } else {
            $user->cart()->create($request->all());
        }

        return redirect()->route('cart.index')->with('success', 'Item added to cart successfully.');
    }

    // Method to update item quantity in the cart
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $cart->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    // Method to remove an item from the cart
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
    }
}
