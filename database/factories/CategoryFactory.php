<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parentCategory = null;

        // if there are categories, there is a 50% chance that the category will have a parent
        if ($this->faker->boolean(50) && Category::exists()) {
            $parentCategory = Category::inRandomOrder()->value('id');
        }

        return [
            'parent_id' => $parentCategory,
            'name' => $this->faker->word,
        ];
    }
}
