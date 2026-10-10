<?php

namespace Tests\Feature;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BudgetTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_budgets_page(): void
    {
        $category = Category::factory()->create(['name' => 'Food Budget Cat', 'type' => 'expense']);
        Budget::factory()->create([
            'category_id' => $category->id,
            'amount' => 10000.00,
            'month_year' => now()->format('Y-m'),
        ]);

        $response = $this->get(route('budgets.index'));

        $response->assertStatus(200);
        $response->assertSee('Food Budget Cat');
    }

    public function test_can_set_budget_limit(): void
    {
        $category = Category::factory()->create(['type' => 'expense']);
        $currentMonth = now()->format('Y-m');

        $response = $this->post(route('budgets.store'), [
            'category_id' => $category->id,
            'amount' => 8500.00,
            'month_year' => $currentMonth,
        ]);

        $response->assertRedirect(route('budgets.index', ['month' => $currentMonth]));
        $this->assertDatabaseHas('budgets', [
            'category_id' => $category->id,
            'amount' => 8500.00,
            'month_year' => $currentMonth,
        ]);
    }
}
