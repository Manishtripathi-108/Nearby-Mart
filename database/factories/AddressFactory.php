<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide if we should use an existing user or location
        $useExistingUser = $this->faker->boolean(80);
        $useExistingLocation = $this->faker->boolean(80);

        // If there are no existing users or locations, we can't use them
        if ($useExistingUser && !User::exists()) {
            $useExistingUser = false;
        }
        if ($useExistingLocation && !Location::exists()) {
            $useExistingLocation = false;
        }

        return [
            'user_id' => $useExistingUser ? User::inRandomOrder()->value('id') : User::factory(),
            'location_id' => $useExistingLocation ? Location::inRandomOrder()->value('id') : Location::factory(),
            'address_line_one' => $this->faker->address,
            'address_line_two' => $this->faker->address,
            'city' => $this->faker->city,
            'phone' => $this->faker->phoneNumber,
            'is_default' => false,
        ];
    }

    public function default()
    {
        return $this->state(function (array $attributes) {
            return [
                'is_default' => true,
            ];
        });
    }

    public function configure()
    {
        return $this->afterMaking(function (Address $address) {
            // Check if there's an existing default address for the same user
            $existingAddress = Address::where('user_id', $address->user_id)
                ->where('id', '!=', $address->id)
                ->where('is_default', true)
                ->first();

            // If no existing default address, set this address as default
            if (!$existingAddress) {
                $address->is_default = true;
                $address->save();
            }
        });
    }
}
