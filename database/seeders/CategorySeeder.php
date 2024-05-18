<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 100 category records in batches of 10
        $batchSize = 10;
        $totalRecords = 100;

        for ($createdRecords = 0; $createdRecords < $totalRecords; $createdRecords += $batchSize) {
            Category::factory(min($batchSize, $totalRecords - $createdRecords))->hasProducts()->create();
        }
    }
}
