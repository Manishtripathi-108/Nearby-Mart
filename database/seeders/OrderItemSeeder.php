<?php

namespace Database\Seeders;

use App\Models\OrderItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderItemSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        // Create 1000 order item records in batches of 10
        $batchSize = 10;
        $totalRecords = 1000;

        for ($i = 0; $i < $totalRecords; $i += $batchSize) {
            OrderItem::factory(min($batchSize, $totalRecords - $i))->forOrder()->forProduct()->create();
        }
    }
}
