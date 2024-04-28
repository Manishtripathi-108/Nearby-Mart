<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{


    // Define the model's default state.

    public function definition(): array
    {
        // Randomly decide if we should use an existing store or category(if exists)
        $useExistingStore = $this->faker->boolean(80);
        $useExistingCategory = Category::exists();

        // If we want to use an existing store but there are no stores, then we can't use an existing store
        if ($useExistingStore && !Store::exists()) {
            $useExistingStore = false;
        }

        return [
            'store_id' => $useExistingStore ? Store::inRandomOrder()->value('id') : Store::factory(),
            'category_id' => $useExistingCategory ? Category::inRandomOrder()->value('id') : Category::factory(),
            'photo_main' => $this->faker->imageUrl(640, 480, 'product', true),
            'photo_1' => $this->faker->imageUrl(640, 480, 'product', true),
            'photo_2' => $this->faker->imageUrl(640, 480, 'product', true),
            'name' => $this->faker->sentence(3),
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'discount' => $this->faker->randomFloat(2, 1, 100),
            'discount_type' => $this->faker->randomElement(['Percentage', 'Fixed']),
            'available' => $this->faker->boolean(90),
            'description' => $this->faker->paragraph(3),
            'stock' => $this->faker->numberBetween(1, 100),
            'units_sold' => $this->faker->numberBetween(1, 1000),
            'measure' => $this->faker->numberBetween(1, 10),
            'sold_by' => $this->faker->randomElement(['kg', 'g', 'lb', 'pcs', 'units', 'each', 'ml', 'l', 'fl oz']),
        ];
    }
}
