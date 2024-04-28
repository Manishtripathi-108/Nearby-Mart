<?php

namespace Database\Factories;

use App\Models\BusinessHour;
use App\Models\Store;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessHour>
 */
class BusinessHourFactory extends Factory
{
    public $days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    // Define the model's default state.
    public function definition(): array
    {
        // Randomly decide if we should use an existing store
        $useExistingStore = $this->faker->boolean(80);
        if ($useExistingStore && !Store::exists()) {
            $useExistingStore = false;
        }

        return [
            'store_id' => $useExistingStore ? Store::inRandomOrder()->value('id') : Store::factory(),
            'day' => $this->faker->randomElement($this->days),
            'open_time' => $this->faker->time(),
            'close_time' => $this->faker->time(),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (BusinessHour $businessHour) {
            // Ensure that the close time is after the open time
            if ($businessHour->close_time < $businessHour->open_time) {
                $businessHour->close_time = $this->faker->dateTimeBetween($businessHour->open_time, '23:59:59');
            }

            $store = Store::find($businessHour->store_id);
            $existingDays = $store->businessHours->pluck('day')->toArray();
            $uniqueDay = collect($this->days)->diff($existingDays)->first();

            // Update the day if it is unique, otherwise drop the record
            if ($uniqueDay !== null) {
                $businessHour->day = $uniqueDay;
                $businessHour->save();
            } else {
                $businessHour->delete();
            }
        });
    }
}
