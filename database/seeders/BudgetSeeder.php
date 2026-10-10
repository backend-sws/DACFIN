<?php

namespace Database\Seeders;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentMonth = now()->format('Y-m');

        $budgets = [
            'Groceries & Food' => 12000.00,
            'Rent & Housing' => 18000.00,
            'Electricity & Utility Bills' => 4500.00,
            'Transport & Fuel' => 5000.00,
            'Dining Out & Cafes' => 4000.00,
            'Shopping & Clothes' => 6000.00,
        ];

        foreach ($budgets as $categoryName => $amount) {
            $cat = Category::where('name', $categoryName)->first();
            if ($cat) {
                Budget::firstOrCreate(
                    ['category_id' => $cat->id, 'month_year' => $currentMonth],
                    ['amount' => $amount]
                );
            }
        }
    }
}
