<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        // Create 1000 order records in batches of 10
        $batchSize = 10;
        $totalRecords = 1000;

        for ($createdRecords = 0; $createdRecords < $totalRecords; $createdRecords += $batchSize) {
            Order::factory(min($batchSize, $totalRecords - $createdRecords))->hasPayment()->hasOrderItems(3)->create();
        }
    }
}
