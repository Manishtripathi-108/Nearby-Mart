<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BusinessHour;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class BusinessHourSeeder extends Seeder
{
    use WithoutModelEvents;

    // Run the database seeds.
    public function run(): void
    {
        // Generate and persist data using factories within a transaction
        DB::transaction(function () {
            // create 1000 business hours in batches of 10
            $batchSize = 10;
            $totalRecords = 1000;

            for ($i = 0; $i < $totalRecords; $i += $batchSize) {
                $businessHours = BusinessHour::factory(min($batchSize, $totalRecords - $i))->forStore()->make();

                foreach ($businessHours as $businessHour) {
                    // Validate store_id and day
                    $validator = Validator::make($businessHour->toArray(), [
                        'store_id' => 'required|exists:stores,id',
                        'day' => 'required|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday|unique:business_hours,day,NULL,id,store_id,' . $businessHour->store_id
                    ]);

                    if ($validator->fails()) {
                        // Skip saving this invalid record
                        continue;
                    }

                    // Save the business hour if validation passes
                    $businessHour->save();
                }
            }
        });
    }
}
