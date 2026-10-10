<?php

namespace Database\Seeders;

use App\Enums\DebtStatus;
use App\Enums\DebtType;
use App\Models\Debt;
use Illuminate\Database\Seeder;

class DebtSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleDebts = [
            [
                'person_name' => 'Rahul Sharma (Colleague)',
                'phone' => '9823102938',
                'type' => DebtType::Lent,
                'amount' => 5000.00,
                'paid_amount' => 2000.00,
                'due_date' => now()->addDays(15)->format('Y-m-d'),
                'status' => DebtStatus::Partial,
                'notes' => 'Emergency medical loan for medicine bills',
            ],
            [
                'person_name' => 'Amit Verma',
                'phone' => '9928172635',
                'type' => DebtType::Lent,
                'amount' => 3500.00,
                'paid_amount' => 0.00,
                'due_date' => now()->addDays(20)->format('Y-m-d'),
                'status' => DebtStatus::Pending,
                'notes' => 'Trip expenses settlement share',
            ],
            [
                'person_name' => 'Vikram Patel',
                'phone' => '9738192019',
                'type' => DebtType::Borrowed,
                'amount' => 10000.00,
                'paid_amount' => 0.00,
                'due_date' => now()->addDays(30)->format('Y-m-d'),
                'status' => DebtStatus::Pending,
                'notes' => 'Borrowed for gadget purchase EMI',
            ],
        ];

        foreach ($sampleDebts as $debt) {
            Debt::firstOrCreate(
                ['person_name' => $debt['person_name'], 'type' => $debt['type']->value],
                $debt
            );
        }
    }
}
