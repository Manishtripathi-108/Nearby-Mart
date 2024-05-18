<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;

class StoreSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        // Create 100 stores in batches of 10
        $batchSize = 10;
        $totalRecords = 100;

        for ($createdRecords = 0; $createdRecords < $totalRecords; $createdRecords += $batchSize) {
            Store::factory(min($batchSize, $totalRecords - $createdRecords))->hasProducts(10)->create();
        }
    }
}
