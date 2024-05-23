<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $cartItems = $user->carts()->with('product')->get();
        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });
        $deliveryMethods=['Home Delivery', 'Store Pickup'];
        return view('orders.checkout', compact('cartItems', 'total','deliveryMethods'));
    }

    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
            'delivery_method' => 'required|string|max:255',
        ]);

        $user = auth()->user();
        $cartItems = $user->carts()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Create the order
        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $request->address_id,
            'no_of_items' => $cartItems->count(),
            'total_amount' => $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            }),
            'delivery_method' => $request->delivery_method,
        ]);

        
        // Create order items
        foreach ($cartItems as $cartItem) {
            $dicount=$cartItem->product->discount_type =='Percentage'?$cartItem->product->price*($cartItem->product->discount/100):$cartItem->product->discount;
           
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_image' => $cartItem->product->image,
                'product_name' => $cartItem->product->name,
                'quantity' => $cartItem->quantity,
                'unit_price' => $cartItem->product->price-$dicount,
                'total_amount' => $cartItem->product->price * $cartItem->quantity,
                'order_status' => 'Pending',
                'item_delivery_date' => null, // Set this accordingly if you have delivery date logic
            ]);
        }

        // Clear the user's cart
        $user->carts()->delete();

        // Redirect to the order details page with success message
        return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully.');
    }
}
