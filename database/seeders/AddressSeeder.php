<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    // Run the database seed
    public function run(): void
    {
        // Create 500 addresses in batches of 10
        $batchSize = 10;
        $totalRecords = 500;

        for ($createdRecords = 0; $createdRecords < $totalRecords; $createdRecords += $batchSize) {
            Address::factory(min($batchSize, $totalRecords - $createdRecords))->forLocation()->forUser()->create();
        }
    }
}
