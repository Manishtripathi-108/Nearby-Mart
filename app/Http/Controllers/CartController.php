<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;


class CartController extends Controller
{
    // Method to show the cart
    public function index()
    {
        $cartItems = Auth()->user()->carts()->with('product')->get();
        return view('product.cart', compact('cartItems'));
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

    // public function add(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'product_id' => 'required|exists:products,id',
    //         'quantity' => 'required|numeric|min:1',
    //     ]);
    //     // Assuming you have a Cart model representing the user's cart
    //     $cart = Cart::where('user_id', auth()->id())->first();

    //     // If the cart doesn't exist, create a new one
    //     if (!$cart) {
    //         $cart = new Cart();
    //         $cart->user_id = auth()->id();
    //         $cart->save();
    //     }

    //     // Add the product to the cart
    //     $cart->products()->attach($product->id);

    //     return redirect()->back()->with('success', 'Product added to cart successfully.');
    // }

    // Method to update item quantity in the cart
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
