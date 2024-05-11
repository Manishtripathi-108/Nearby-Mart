<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;


class CartController extends Controller
{
    // Method to show the cart
    public function index()
    {
        $cartItems = Auth()->user()->carts()->with('product')->get();
        return view('cart.cart', compact('cartItems'));
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

    public function add(Request $request, Product $product)
    {

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|numeric|min:1',
        ]);
        // Assuming you have a Cart model representing the user's cart
        $cart = Cart::where('user_id', auth()->id())->first();

        // If the cart doesn't exist, create a new one
        if (!$cart) {
            $cart = new Cart();
            $cart->user_id = auth()->id();
            $cart->save();
        }

        // Add the product to the cart
        $cart->products()->attach($product->id);

        return redirect()->back()->with('success', 'Product added to cart successfully.');
    }

    // Method to update item quantity in the cart

    //method to retur total amount of cart
    // public function cartTotal()
    // {
    //     $cartItems = auth()->user()->carts()->with('product')->get();
    //     $total = $cartItems->sum(function ($item) {
    //         return $item->product->price * $item->quantity;
    //     });

    //     return view('partials.cart_total', compact('total'));
    // }

    public function checkout()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Retrieve the user's cart items
        $cartItems = $user->carts()->with('product')->get();

        // Create a new order
        $order = new Order();
        $order->user_id = $user->id;
        $order->no_of_items = $cartItems->sum('quantity');
        $order->total_amount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $order->save();

        // Move cart items to order items
        foreach ($cartItems as $cartItem) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $cartItem->product_id;
            $orderItem->quantity = $cartItem->quantity;
            $orderItem->unit_price = $cartItem->product->price;
            $orderItem->total_amount = $cartItem->product->price * $cartItem->quantity;
            $orderItem->save();
        }

        // Clear the user's cart
        $user->carts()->delete();

        return view('checkout', compact('order'));
    }
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
