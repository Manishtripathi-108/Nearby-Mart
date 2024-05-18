<?php

namespace App\Livewire;

use App\Models\OrderItem;
use Livewire\Component;

class RecentOrders extends Component
{
    public function confirmOrder($orderId)
    {
        $orderItem = OrderItem::find($orderId);
        $orderItem->update(['order_status' => 'Confirmed']);
    }

    public function cancelOrder($orderId)
    {
        $orderItem = OrderItem::find($orderId);
        $orderItem->update(['order_status' => 'Cancelled']);
    }

    public function render()
    {
        $user = auth()->user();
        $storesWithOrderItemsAndProducts = $user->stores()
            ->with([
                'orderItems' => function ($query) {
                    $query->latest()->take(5);
                }
            ])
            ->get();

        return view(
            'livewire.recent-orders',
            ['storesWithOrderItems' => $storesWithOrderItemsAndProducts]
        );
    }
}
