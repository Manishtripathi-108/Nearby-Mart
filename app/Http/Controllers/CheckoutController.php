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
        return view('orders.checkout', compact('cartItems', 'total'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email',
        //     'card_holder' => 'required|string|max:255',
        //     'card_no' => 'required|string|max:19',
        //     'credit_expiry' => 'required|string|max:5',
        //     'credit_cvc' => 'required|string|max:3',
        //     'billing_address' => 'required|string|max:255',
        //     'billing_state' => 'required|string|max:255',
        //     'billing_zip' => 'required|string|max:10',
        // ]);

        // $user = auth()->user();
        // $cartItems = $user->carts()->with('product')->get();

        // $order = new Order();
        // $order->user_id = $user->id;
        // $order->address_id = $request->billing_address; // Assuming address ID is passed
        // $order->no_of_items = $cartItems->count();
        // $order->total_amount = $cartItems->sum(function ($item) {
        //     return $item->product->price * $item->quantity;
        // });
        // $order->save();

        // foreach ($cartItems as $cartItem) {
        //     OrderItem::create([
        //         'order_id' => $order->id,
        //         'product_id' => $cartItem->product_id,
        //         'quantity' => $cartItem->quantity,
        //         'unit_price' => $cartItem->product->price,
        //         'total_amount' => $cartItem->product->price * $cartItem->quantity,
        //         'product_image' => $cartItem->product->image,
        //         'product_name' => $cartItem->product->name,
        //     ]);
        // }

        // $user->carts()->delete();

        // return redirect()->route('orders.show', $order->id)->with('success', 'Order placed successfully.');
        return view('orders.yourOrders');
    }
}