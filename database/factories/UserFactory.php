<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserDetail;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    // The current password being used by the factory.
    protected static ?string $password;

    // Define the model's default state.
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
        ];
    }

    // Indicate that the model's email address should be unverified.
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure()
    {
        return $this->afterMaking(function (User $user) {
            // Ensure the email is unique
            do {
                $user_exists = User::where('email', $user->email)->exists();
                if ($user_exists) {
                    $user->email = $user->id . '.' . fake()->unique()->safeEmail();
                }
            } while ($user_exists);

            $user->save();
        })->afterCreating(function (User $user) {
            // Create a user detail for the user if one does not exist
            if (!UserDetail::where('user_id', $user->id)->exists()) {
                UserDetail::factory(1)->create(['user_id' => $user->id]);
            }
        });
    }
}
