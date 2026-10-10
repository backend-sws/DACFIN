<?php

namespace Database\Factories;

use App\Enums\AccountType;
use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Account>
 */
class AccountFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $initialBalance = fake()->randomFloat(2, 1000, 50000);

        return [
            'name' => fake()->randomElement(['HDFC Bank', 'SBI Account', 'Cash Wallet', 'ICICI Savings', 'Paytm Wallet']),
            'type' => fake()->randomElement(AccountType::cases()),
            'account_number' => fake()->numerify('##########'),
            'initial_balance' => $initialBalance,
            'current_balance' => $initialBalance,
            'currency' => '₹',
            'color' => fake()->randomElement(['#2563eb', '#10b981', '#f59e0b', '#8b5cf6', '#ef4444']),
            'is_active' => true,
            'notes' => fake()->sentence(),
        ];
    }
}
