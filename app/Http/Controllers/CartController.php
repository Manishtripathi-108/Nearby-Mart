<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    // Method to show the cart
    public function index()
    {
        $cartItems = auth()->user()->carts()->with('product')->get();
        return view('cart.cart', compact('cartItems'));
    }

    // Method to add an item to the cart
    public function add(Request $request, $productId)
    {
        $user = auth()->user();
        $product = Product::findOrFail($productId);

        // Check if the product is already in the cart
        $cartItem = $user->productsInCart()->where('product_id', $productId)->first();

        if ($cartItem) {
            // Increment the quantity if the product is already in the cart
            $cartItem->pivot->quantity += 1;
            $cartItem->pivot->save();
        } else {
            // Add the product to the cart with quantity 1
            $user->productsInCart()->attach($productId, ['quantity' => 1]);
        }

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    // Method to update the cart
    public function update(Request $request, Cart $cartItem)
    {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated successfully.');
    }

    // Method to remove an item from the cart
    public function destroy(Cart $cartItem)
    {
        $cartItem->delete();
        return redirect()->route('cart.index')->with('success', 'Item removed from cart successfully.');
    }
}
