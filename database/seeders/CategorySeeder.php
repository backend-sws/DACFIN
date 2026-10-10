<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            // Income
            ['name' => 'Salary', 'type' => CategoryType::Income, 'icon' => 'briefcase', 'color' => '#10b981', 'is_system' => true],
            ['name' => 'Freelance & Projects', 'type' => CategoryType::Income, 'icon' => 'laptop', 'color' => '#06b6d4', 'is_system' => true],
            ['name' => 'Business Revenue', 'type' => CategoryType::Income, 'icon' => 'trending-up', 'color' => '#3b82f6', 'is_system' => true],
            ['name' => 'Investments & Dividends', 'type' => CategoryType::Income, 'icon' => 'bar-chart-2', 'color' => '#8b5cf6', 'is_system' => true],
            ['name' => 'Rental Income', 'type' => CategoryType::Income, 'icon' => 'home', 'color' => '#14b8a6', 'is_system' => true],
            ['name' => 'Other Income', 'type' => CategoryType::Income, 'icon' => 'plus-circle', 'color' => '#64748b', 'is_system' => true],

            // Expense
            ['name' => 'Groceries & Food', 'type' => CategoryType::Expense, 'icon' => 'shopping-cart', 'color' => '#f59e0b', 'is_system' => true],
            ['name' => 'Rent & Housing', 'type' => CategoryType::Expense, 'icon' => 'home', 'color' => '#ef4444', 'is_system' => true],
            ['name' => 'Electricity & Utility Bills', 'type' => CategoryType::Expense, 'icon' => 'zap', 'color' => '#eab308', 'is_system' => true],
            ['name' => 'Transport & Fuel', 'type' => CategoryType::Expense, 'icon' => 'navigation', 'color' => '#f97316', 'is_system' => true],
            ['name' => 'Dining Out & Cafes', 'type' => CategoryType::Expense, 'icon' => 'coffee', 'color' => '#ec4899', 'is_system' => true],
            ['name' => 'Shopping & Clothes', 'type' => CategoryType::Expense, 'icon' => 'gift', 'color' => '#a855f7', 'is_system' => true],
            ['name' => 'Healthcare & Medicines', 'type' => CategoryType::Expense, 'icon' => 'activity', 'color' => '#06b6d4', 'is_system' => true],
            ['name' => 'Entertainment & OTT', 'type' => CategoryType::Expense, 'icon' => 'film', 'color' => '#6366f1', 'is_system' => true],
            ['name' => 'Education & Books', 'type' => CategoryType::Expense, 'icon' => 'book-open', 'color' => '#3b82f6', 'is_system' => true],
            ['name' => 'Miscellaneous', 'type' => CategoryType::Expense, 'icon' => 'tag', 'color' => '#64748b', 'is_system' => true],
        ];

        foreach ($categories as $cat) {
            Category::firstOrCreate(
                ['name' => $cat['name'], 'type' => $cat['type']->value],
                $cat
            );
        }
    }
}
