<?php

namespace Database\Seeders;

use App\Enums\AccountType;
use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'HDFC Primary Bank',
                'type' => AccountType::Bank,
                'account_number' => '501004928172',
                'initial_balance' => 85000.00,
                'current_balance' => 85000.00,
                'currency' => '₹',
                'color' => '#2563eb',
                'is_active' => true,
                'notes' => 'Salary and primary operating account',
            ],
            [
                'name' => 'Cash Wallet',
                'type' => AccountType::Cash,
                'account_number' => null,
                'initial_balance' => 12500.00,
                'current_balance' => 12500.00,
                'currency' => '₹',
                'color' => '#10b981',
                'is_active' => true,
                'notes' => 'Daily physical cash expenses',
            ],
            [
                'name' => 'SBI Savings Account',
                'type' => AccountType::Savings,
                'account_number' => '32819283741',
                'initial_balance' => 45000.00,
                'current_balance' => 45000.00,
                'currency' => '₹',
                'color' => '#0891b2',
                'is_active' => true,
                'notes' => 'Emergency reserve fund',
            ],
            [
                'name' => 'ICICI Credit Card',
                'type' => AccountType::CreditCard,
                'account_number' => '4129-XXXX-XXXX-8901',
                'initial_balance' => 0.00,
                'current_balance' => 0.00,
                'currency' => '₹',
                'color' => '#f59e0b',
                'is_active' => true,
                'notes' => 'Online purchases and bill payments',
            ],
        ];

        foreach ($accounts as $acc) {
            Account::firstOrCreate(
                ['name' => $acc['name']],
                $acc
            );
        }
    }
}
