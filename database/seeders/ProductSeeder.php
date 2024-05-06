<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        // Create 1000 products in batches of 10
        $batchSize = 10;
        $totalRecords = 1000;

        for ($i = 0; $i < $totalRecords; $i += $batchSize) {
            Product::factory(min($batchSize, $totalRecords - $i))->forStore()->hasFeedbackRatings(5)->create();
        }
    }
}
