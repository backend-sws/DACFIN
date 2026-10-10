<?php

namespace Tests\Feature;

use App\Enums\AccountType;
use App\Models\Account;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_accounts_index(): void
    {
        Account::factory()->create(['name' => 'Salary Account']);

        $response = $this->get(route('accounts.index'));

        $response->assertStatus(200);
        $response->assertSee('Salary Account');
    }

    public function test_can_create_account(): void
    {
        $response = $this->post(route('accounts.store'), [
            'name' => 'New Savings Bank',
            'type' => AccountType::Bank->value,
            'account_number' => '1234567890',
            'initial_balance' => 15000.00,
            'currency' => '₹',
            'color' => '#2563eb',
        ]);

        $response->assertRedirect(route('accounts.index'));
        $this->assertDatabaseHas('accounts', [
            'name' => 'New Savings Bank',
            'current_balance' => 15000.00,
        ]);
    }

    public function test_can_transfer_funds_between_accounts(): void
    {
        $source = Account::factory()->create([
            'name' => 'Source Bank',
            'initial_balance' => 10000.00,
            'current_balance' => 10000.00,
        ]);

        $destination = Account::factory()->create([
            'name' => 'Cash Wallet',
            'initial_balance' => 2000.00,
            'current_balance' => 2000.00,
        ]);

        $response = $this->post(route('accounts.transfer'), [
            'from_account_id' => $source->id,
            'to_account_id' => $destination->id,
            'amount' => 3000.00,
            'date' => now()->format('Y-m-d'),
            'description' => 'ATM withdrawal to cash',
        ]);

        $response->assertSessionHas('success');

        $source->refresh();
        $destination->refresh();

        $this->assertEquals(7000.00, (float) $source->current_balance);
        $this->assertEquals(5000.00, (float) $destination->current_balance);
    }
}
