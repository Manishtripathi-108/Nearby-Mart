<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentSeeder extends Seeder
{
    // Run the database seeds.
    public function run(): void
    {
        DB::transaction(function () {
            // Create 1000 payments in batches of 10
            $batchSize = 10;
            $totalRecords = 1000;

            for ($createdRecords = 0; $createdRecords < $totalRecords; $createdRecords += $batchSize) {
                $payments = Payment::factory(min($batchSize, $totalRecords - $createdRecords))->make();

                foreach ($payments as $payment) {
                    // Validate that order_id is unique within the collection of payments
                    if (Payment::where('order_id', $payment->order_id)->doesntExist()) {
                        $payment->save();
                    }
                }
            }
        });
    }
}
