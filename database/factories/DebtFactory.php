<?php

namespace Database\Factories;

use App\Enums\DebtStatus;
use App\Enums\DebtType;
use App\Models\Debt;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Debt>
 */
class DebtFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $amount = fake()->randomFloat(2, 1000, 25000);

        return [
            'person_name' => fake()->name(),
            'phone' => fake()->numerify('98########'),
            'type' => fake()->randomElement(DebtType::cases()),
            'amount' => $amount,
            'paid_amount' => 0.00,
            'due_date' => fake()->dateTimeBetween('now', '+2 months')->format('Y-m-d'),
            'status' => DebtStatus::Pending,
            'notes' => fake()->sentence(),
        ];
    }
}
