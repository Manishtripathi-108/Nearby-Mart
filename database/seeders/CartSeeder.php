<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        // Create 1000 cart records in batches of 10
        $batchSize = 10;
        $totalRecords = 1000;

        for ($createdRecords = 0; $createdRecords < $totalRecords; $createdRecords += $batchSize) {
            Cart::factory(min($batchSize, $totalRecords - $createdRecords))->forProduct()->forUser()->create();
        }
    }
}
