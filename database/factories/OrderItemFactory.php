<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide if we should use an existing order or product
        $useExistingOrder = $this->faker->boolean(80);
        $useExistingProduct = $this->faker->boolean(80);

        if ($useExistingOrder && !Order::exists()) {
            $useExistingOrder = false;
        }
        if ($useExistingProduct && !Product::exists()) {
            $useExistingProduct = false;
        }

        $price = $this->faker->randomFloat(2, 1, 1000);
        $quantity = $this->faker->numberBetween(1, 10);

        return [
            'order_id' => $useExistingOrder ? Order::inRandomOrder()->value('id') : Order::factory(),
            'product_id' => $useExistingProduct ? Product::inRandomOrder()->value('id') : Product::factory(),
            'product_image' => 'product.png',
            'product_name' => $this->faker->word,
            'unit_price' => $price,
            'quantity' => $quantity,
            'total_amount' => $price * $quantity,
            'order_status' => $this->faker->randomElement(['Confirmed', 'Processing', 'Delivered', 'Cancelled']),
            'item_delivery_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
