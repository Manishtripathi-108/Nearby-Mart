<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
{
    // Define the model that this factory generates
    public function definition(): array
    {
        // Randomly decide if we should use an existing user or product
        $useExistingUser = $this->faker->boolean(80);
        $useExistingProduct = $this->faker->boolean(80);

        return [
            'user_id' => $useExistingUser ? User::inRandomOrder()->value('id') : User::factory(),
            'product_id' => $useExistingProduct ? Product::inRandomOrder()->value('id') : Product::factory(),
            'quantity' => $this->faker->numberBetween(1, 5),
        ];
    }
}
