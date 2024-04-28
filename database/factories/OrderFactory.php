<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide if we should use an existing user or address
        $useExistingUser = $this->faker->boolean(80);
        $useExistingAddress = $this->faker->boolean(80);

        if ($useExistingUser && !User::exists()) {
            $useExistingUser = false;
        }

        if ($useExistingAddress && !Address::exists()) {
            $useExistingAddress = false;
        }

        return [
            'user_id' => $useExistingUser ? User::inRandomOrder()->value('id') : User::factory(),
            'address_id' => $useExistingAddress ? Address::inRandomOrder()->value('id') : Address::factory(),
            'no_of_items' => $this->faker->numberBetween(1, 10),
            'total_amount' => $this->faker->randomFloat(2, 10, 10000),
            'delivery_method' => $this->faker->randomElement(['Home Delivery', 'Store Pickup']),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($order) {

            // Create order items if none exist
            if (!OrderItem::where('order_id', $order->id)->exists()) {
                OrderItem::factory(1)->create(['order_id' => $order->id]);
            }

            // Create Payment if none exists
            if (!$order->payment) {
                $order->payment()->create([
                    'amount' => $order->total_amount,
                    'payment_method' => $this->faker->randomElement(['Credit Card', 'Debit Card', 'PayPal']),
                    'payment_status' => $this->faker->randomElement(['Pending', 'Failed', 'Completed']),
                    'completed_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
                ]);
            }

            // Update order total amount and number of items
            $orderDetails = OrderItem::selectRaw('SUM(quantity) as no_of_items, SUM(total_amount) as total_amount')
                ->where('order_id', $order->id)
                ->first();

            $order->update([
                'no_of_items' => $orderDetails->no_of_items ?? 0,
                'total_amount' => $orderDetails->total_amount ?? 0,
            ]);
        });
    }
}
