<?php

namespace Tests\Feature;

use App\Enums\DebtStatus;
use App\Enums\DebtType;
use App\Models\Debt;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DebtTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_debts_page(): void
    {
        Debt::factory()->create(['person_name' => 'Suresh Friend', 'type' => DebtType::Lent]);

        $response = $this->get(route('debts.index'));

        $response->assertStatus(200);
        $response->assertSee('Suresh Friend');
    }

    public function test_can_create_debt_record(): void
    {
        $response = $this->post(route('debts.store'), [
            'person_name' => 'Rohan Sharma',
            'phone' => '9876543210',
            'type' => DebtType::Lent->value,
            'amount' => 5000.00,
            'due_date' => now()->addDays(15)->format('Y-m-d'),
            'notes' => 'Urgent medical help',
        ]);

        $response->assertRedirect(route('debts.index'));
        $this->assertDatabaseHas('debts', [
            'person_name' => 'Rohan Sharma',
            'amount' => 5000.00,
            'status' => DebtStatus::Pending->value,
        ]);
    }

    public function test_can_record_payment_and_update_status(): void
    {
        $debt = Debt::factory()->create([
            'amount' => 10000.00,
            'paid_amount' => 0.00,
            'status' => DebtStatus::Pending,
        ]);

        // Partial payment
        $response = $this->post(route('debts.payment', $debt), [
            'amount' => 4000.00,
        ]);

        $response->assertSessionHas('success');
        $debt->refresh();
        $this->assertEquals(4000.00, (float) $debt->paid_amount);
        $this->assertEquals(DebtStatus::Partial, $debt->status);

        // Full remaining payment
        $response = $this->post(route('debts.payment', $debt), [
            'amount' => 6000.00,
        ]);

        $debt->refresh();
        $this->assertEquals(10000.00, (float) $debt->paid_amount);
        $this->assertEquals(DebtStatus::Settled, $debt->status);
    }
}
