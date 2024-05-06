<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeedbackRating>
 */
class FeedbackRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide if we should use an existing user or product
        $useExistingUser = $this->faker->boolean(80);
        $useExistingProduct = $this->faker->boolean(80);

        if ($useExistingUser && !User::exists()) {
            $useExistingUser = false;
        }
        if ($useExistingProduct && !Product::exists()) {
            $useExistingProduct = false;
        }

        return [
            'user_id' => $useExistingUser ? User::inRandomOrder()->value('id') : User::factory(),
            'product_id' => $useExistingProduct ? Product::inRandomOrder()->value('id') : Product::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->sentence,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($feedbackRating) {
            // Update product rating
            $product = Product::withCount('feedbackRatings')->findOrFail($feedbackRating->product_id);
            $ratingCount = $product->feedback_ratings_count;
            $totalRating = $product->feedbackRatings->sum('rating');

            if ($ratingCount > 0) {
                $product->update([
                    'rating' => $totalRating / $ratingCount,
                ]);
            }
        });
    }
}
