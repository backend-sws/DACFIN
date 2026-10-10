<?php

namespace Database\Seeders;

use App\Enums\TransactionType;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $primaryBank = Account::where('name', 'HDFC Primary Bank')->first();
        $cashWallet = Account::where('name', 'Cash Wallet')->first();

        $salaryCat = Category::where('name', 'Salary')->first();
        $freelanceCat = Category::where('name', 'Freelance & Projects')->first();
        $groceriesCat = Category::where('name', 'Groceries & Food')->first();
        $rentCat = Category::where('name', 'Rent & Housing')->first();
        $utilityCat = Category::where('name', 'Electricity & Utility Bills')->first();
        $diningCat = Category::where('name', 'Dining Out & Cafes')->first();
        $fuelCat = Category::where('name', 'Transport & Fuel')->first();

        if (! $primaryBank || ! $cashWallet) {
            return;
        }

        $today = now();

        $sampleTransactions = [
            // Incomes
            [
                'account_id' => $primaryBank->id,
                'category_id' => $salaryCat?->id,
                'type' => TransactionType::Income,
                'amount' => 75000.00,
                'date' => $today->copy()->startOfMonth()->format('Y-m-d'),
                'description' => 'Monthly Salary Credited',
                'reference_number' => 'SAL-OCT26',
            ],
            [
                'account_id' => $primaryBank->id,
                'category_id' => $freelanceCat?->id,
                'type' => TransactionType::Income,
                'amount' => 22000.00,
                'date' => $today->copy()->subDays(5)->format('Y-m-d'),
                'description' => 'Freelance Web Design Milestone 1',
                'reference_number' => 'FL-99182',
            ],
            // Expenses
            [
                'account_id' => $primaryBank->id,
                'category_id' => $rentCat?->id,
                'type' => TransactionType::Expense,
                'amount' => 18000.00,
                'date' => $today->copy()->startOfMonth()->addDays(2)->format('Y-m-d'),
                'description' => 'Apartment Rent via UPI',
                'reference_number' => 'UPI-8192831',
            ],
            [
                'account_id' => $primaryBank->id,
                'category_id' => $utilityCat?->id,
                'type' => TransactionType::Expense,
                'amount' => 3200.00,
                'date' => $today->copy()->subDays(6)->format('Y-m-d'),
                'description' => 'Electricity Bill Payment',
                'reference_number' => 'EB-90182',
            ],
            [
                'account_id' => $cashWallet->id,
                'category_id' => $groceriesCat?->id,
                'type' => TransactionType::Expense,
                'amount' => 2450.00,
                'date' => $today->copy()->subDays(3)->format('Y-m-d'),
                'description' => 'Supermarket Grocery & Dairy',
                'reference_number' => null,
            ],
            [
                'account_id' => $cashWallet->id,
                'category_id' => $diningCat?->id,
                'type' => TransactionType::Expense,
                'amount' => 1150.00,
                'date' => $today->copy()->subDays(1)->format('Y-m-d'),
                'description' => 'Weekend Dinner with Friends',
                'reference_number' => null,
            ],
            [
                'account_id' => $primaryBank->id,
                'category_id' => $fuelCat?->id,
                'type' => TransactionType::Expense,
                'amount' => 2500.00,
                'date' => $today->copy()->subDays(4)->format('Y-m-d'),
                'description' => 'Petrol Pump Refill',
                'reference_number' => 'POS-39182',
            ],
            // Transfer
            [
                'account_id' => $primaryBank->id,
                'to_account_id' => $cashWallet->id,
                'category_id' => null,
                'type' => TransactionType::Transfer,
                'amount' => 5000.00,
                'date' => $today->copy()->subDays(8)->format('Y-m-d'),
                'description' => 'ATM Cash Withdrawal to Cash Wallet',
                'reference_number' => 'ATM-20192',
            ],
        ];

        foreach ($sampleTransactions as $data) {
            Transaction::create($data);
        }

        // Recalculate balances
        foreach (Account::all() as $acc) {
            $acc->recalculateBalance();
        }
    }
}
