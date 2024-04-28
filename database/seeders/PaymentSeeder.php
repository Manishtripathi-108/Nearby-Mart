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

            for ($i = 0; $i < $totalRecords; $i += $batchSize) {
                $payments = Payment::factory(min($batchSize, $totalRecords - $i))->forOrder()->make();

                foreach ($payments as $payment) {
                    // Validate that payment_id and order_id are unique within the collection of payments
                    $validator = Validator::make($payment->toArray(), [
                        'order_id' => 'unique:payments,order_id,' . $payment->order_id,
                    ]);

                    if ($validator->fails()) {
                        // Skip saving this invalid record
                        continue;
                    }

                    // Save the payment
                    $payment->save();
                }
            }
        });
    }
}
