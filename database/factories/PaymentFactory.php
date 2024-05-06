<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Randomly decide if we should use an existing order
        $useExistingOrder = $this->faker->boolean(80);

        if ($useExistingOrder && Order::count() === 0) {
            $useExistingOrder = false;
        }

        return [
            'order_id' => $useExistingOrder ? Order::inRandomOrder()->value('id') : Order::factory(),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'payment_method' => $this->faker->randomElement(['Credit Card', 'Debit Card', 'PayPal']),
            'payment_status' => $this->faker->randomElement(['Pending', 'Completed', 'Failed']),
            'completed_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($payment) {
            // Create a order if one does not exist
            if (!Order::where('id', $payment->order_id)->exists()) {
                Order::factory(1)->create(['id' => $payment->order_id]);
            }

            // Update payment amount
            $order_amount = Order::find($payment->order_id)->total_amount;
            $payment->update([
                'amount' => $order_amount,
            ]);
        });
    }
}
