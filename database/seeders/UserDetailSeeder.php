<?php

namespace Database\Seeders;

use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        // Create 1000 user details in batches of 10
        $batchSize = 10;
        $totalRecords = 1000;

        for ($i = 0; $i < $totalRecords; $i += $batchSize) {
            UserDetail::factory(min($batchSize, $totalRecords - $i))->forUser()->create();
        }
    }
}
