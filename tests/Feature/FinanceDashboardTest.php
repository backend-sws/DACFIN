<?php

namespace Tests\Feature;

use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FinanceDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_renders_successfully(): void
    {
        Account::factory()->create(['name' => 'Main Bank', 'current_balance' => 50000]);

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Main Bank');
        $response->assertSee('Dashboard Overview');
    }

    public function test_dashboard_displays_recent_transactions(): void
    {
        $account = Account::factory()->create();
        $category = Category::factory()->create();
        $transaction = Transaction::factory()->create([
            'account_id' => $account->id,
            'category_id' => $category->id,
            'description' => 'Grocery shopping test',
            'amount' => 1500.00,
        ]);

        $response = $this->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Grocery shopping test');
    }
}
