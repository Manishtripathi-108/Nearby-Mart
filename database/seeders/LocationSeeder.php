<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        // create 100 locations in batches of 10
        $batchSize = 10;
        $totalRecords = 100;

        for ($i = 0; $i < $totalRecords; $i += $batchSize) {
            Location::factory(min($batchSize, $totalRecords - $i))->hasAddresses()->create();
        }
    }
}
