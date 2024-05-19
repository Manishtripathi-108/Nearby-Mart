<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Email;

class UserSeeder extends Seeder
{
    // Run the database seeds. 
    public function run(): void
    {
        DB::transaction(function () {
            // Create 1000 users in batches of 10
            $batchSize = 10;
            $totalRecords = 1000;

            for ($createdRecords = 0; $createdRecords < $totalRecords; $createdRecords += $batchSize) {
                $users = User::factory(min($batchSize, $totalRecords - $createdRecords))->make();

                // Ensure uniqueness of email within the batch
                $uniqueUsers = $users->unique('email');

                foreach ($uniqueUsers as $uniqueUser) {
                    // Validate email uniqueness in the database
                    if (User::where('email', $uniqueUser->email)->doesntExist()) {
                        // Save the user if the email is unique
                        $uniqueUser->save();
                    }
                }
            }
        });

        // Create an admin user if it does not exist
        if (User::where('email', 'manish@gmail.com')->doesntExist()) {
            User::factory()
                ->hasOrders(10)
                ->hasAddresses(3)
                ->hasStores(2)
                ->create([
                    'profile_picture' => 'images/profile/avatar/manish.jpg',
                    'name' => 'Manish Tripathi',
                    'dob' => '2000-01-01',
                    'phone' => '1234567890',
                    'user_type' => 'Admin',
                    'email' => 'manish@gmail.com',
                    'password' => Hash::make('Manish@123')
                ]);
        }
    }
}
