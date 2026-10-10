<?php

namespace Database\Factories;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(CategoryType::cases());

        return [
            'name' => fake()->unique()->word(),
            'type' => $type,
            'icon' => fake()->randomElement(['wallet', 'shopping-cart', 'home', 'car', 'briefcase', 'coffee']),
            'color' => fake()->hexColor(),
            'is_system' => false,
        ];
    }
}
