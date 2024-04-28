<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    // Define the model that this factory generates
    public function definition(): array
    {
        // Randomly decide if we should use an existing address and user
        $useExistingAddress = $this->faker->boolean(80);
        $useExistingUser = $this->faker->boolean(80);

        // If we want to use an existing address or user, but there are none, then don't use them
        if ($useExistingAddress && !Address::exists()) {
            $useExistingAddress = false;
        }
        if ($useExistingUser && !User::exists()) {
            $useExistingUser = false;
        }
        return [
            'user_id' => $useExistingUser ? User::inRandomOrder()->value('id') : User::factory(),
            'address_id' => $useExistingAddress ? Address::inRandomOrder()->value('id') : Address::factory(),
            'name' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->companyEmail,
        ];
    }
}
