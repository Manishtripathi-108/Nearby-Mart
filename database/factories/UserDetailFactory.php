<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserDetail>
 */
class UserDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide if we should use an existing user
        $useExistingUser = $this->faker->boolean(80);

        if ($useExistingUser && User::count() === 0) {
            $useExistingUser = false;
        }

        return [
            'user_id' => $useExistingUser ? User::inRandomOrder()->value('id') : User::factory(),
            'profile_picture' => $this->faker->imageUrl(640, 480, 'people', true),
            'dob' => $this->faker->date(),
            'phone' => $this->faker->phoneNumber,
            'user_type' => $this->faker->randomElement(['Customer', 'Store Owner']),
        ];
    }
}
