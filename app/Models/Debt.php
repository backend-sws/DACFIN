<?php

namespace App\Models;

use App\Enums\DebtStatus;
use App\Enums\DebtType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Debt
 *
 * @property int $id
 * @property string $person_name
 * @property string|null $phone
 * @property DebtType $type
 * @property string $amount
 * @property string $paid_amount
 * @property Carbon|null $due_date
 * @property DebtStatus $status
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Debt extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'person_name',
        'phone',
        'type',
        'amount',
        'paid_amount',
        'due_date',
        'status',
        'notes',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => DebtType::class,
            'status' => DebtStatus::class,
            'amount' => 'decimal:2',
            'paid_amount' => 'decimal:2',
            'due_date' => 'date',
        ];
    }

    /**
     * Calculate remaining unpaid amount.
     */
    public function getRemainingAmount(): float
    {
        return max(0.0, (float) $this->amount - (float) $this->paid_amount);
    }

    /**
     * Record a payment and update status automatically.
     */
    public function recordPayment(float $paymentAmount): void
    {
        $newPaidAmount = (float) $this->paid_amount + $paymentAmount;
        $totalAmount = (float) $this->amount;

        $newStatus = DebtStatus::Pending;
        if ($newPaidAmount >= $totalAmount) {
            $newStatus = DebtStatus::Settled;
            $newPaidAmount = $totalAmount;
        } elseif ($newPaidAmount > 0) {
            $newStatus = DebtStatus::Partial;
        }

        $this->update([
            'paid_amount' => $newPaidAmount,
            'status' => $newStatus,
        ]);
    }
}
