<?php

namespace Tests\Feature;

use App\Enums\TransactionType;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_transactions_index(): void
    {
        $account = Account::factory()->create();
        $category = Category::factory()->create();
        Transaction::factory()->create([
            'account_id' => $account->id,
            'category_id' => $category->id,
            'description' => 'Test Transaction Ledger',
        ]);

        $response = $this->get(route('transactions.index'));

        $response->assertStatus(200);
        $response->assertSee('Test Transaction Ledger');
    }

    public function test_can_store_income_transaction_and_update_balance(): void
    {
        $account = Account::factory()->create([
            'initial_balance' => 5000.00,
            'current_balance' => 5000.00,
        ]);
        $category = Category::factory()->create(['type' => 'income']);

        $response = $this->post(route('transactions.store'), [
            'account_id' => $account->id,
            'category_id' => $category->id,
            'type' => TransactionType::Income->value,
            'amount' => 2500.00,
            'date' => now()->format('Y-m-d'),
            'description' => 'Freelance payout',
        ]);

        $response->assertSessionHas('success');

        $account->refresh();
        $this->assertEquals(7500.00, (float) $account->current_balance);
        $this->assertDatabaseHas('transactions', [
            'description' => 'Freelance payout',
            'amount' => 2500.00,
        ]);
    }

    public function test_can_store_expense_transaction_and_update_balance(): void
    {
        $account = Account::factory()->create([
            'initial_balance' => 5000.00,
            'current_balance' => 5000.00,
        ]);
        $category = Category::factory()->create(['type' => 'expense']);

        $response = $this->post(route('transactions.store'), [
            'account_id' => $account->id,
            'category_id' => $category->id,
            'type' => TransactionType::Expense->value,
            'amount' => 1200.00,
            'date' => now()->format('Y-m-d'),
            'description' => 'Grocery shopping bill',
        ]);

        $response->assertSessionHas('success');

        $account->refresh();
        $this->assertEquals(3800.00, (float) $account->current_balance);
    }

    public function test_deleting_transaction_restores_balance(): void
    {
        $account = Account::factory()->create([
            'initial_balance' => 5000.00,
            'current_balance' => 5000.00,
        ]);
        $category = Category::factory()->create(['type' => 'expense']);

        $transaction = Transaction::factory()->create([
            'account_id' => $account->id,
            'category_id' => $category->id,
            'type' => TransactionType::Expense->value,
            'amount' => 1000.00,
        ]);

        $account->recalculateBalance();
        $this->assertEquals(4000.00, (float) $account->current_balance);

        $response = $this->delete(route('transactions.destroy', $transaction));

        $response->assertSessionHas('success');

        $account->refresh();
        $this->assertEquals(5000.00, (float) $account->current_balance);
    }
}
