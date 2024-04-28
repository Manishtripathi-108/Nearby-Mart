<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            // Create 1000 users in batches of 10
            $batchSize = 10;
            $totalRecords = 1000;

            for ($i = 0; $i < $totalRecords; $i += $batchSize) {
                $users = User::factory(min($batchSize, $totalRecords - $i))->hasUserDetail()->hasAddresses(3)->hasStores(2)->make();

                foreach ($users as $user) {
                    // validate email
                    $validator = validator($user->toArray(), [
                        'email' => 'required|email|unique:users,email',
                    ]);

                    if ($validator->fails()) {
                        // Skip saving this invalid record
                        continue;
                    }

                    // Save the user if validation passes
                    $user->save();
                }
            }
        });
    }
}
