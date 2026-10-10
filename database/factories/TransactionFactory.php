<?php

namespace Database\Factories;

use App\Enums\TransactionType;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'account_id' => Account::factory(),
            'category_id' => Category::factory(),
            'to_account_id' => null,
            'type' => fake()->randomElement([TransactionType::Income, TransactionType::Expense]),
            'amount' => fake()->randomFloat(2, 50, 5000),
            'date' => fake()->dateTimeBetween('-1 month', 'now')->format('Y-m-d'),
            'description' => fake()->sentence(3),
            'reference_number' => fake()->bothify('TXN-#####'),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
