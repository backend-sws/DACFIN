<?php

namespace App\Models;

use App\Enums\AccountType;
use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Account
 *
 * @property int $id
 * @property string $name
 * @property AccountType $type
 * @property string|null $account_number
 * @property string $initial_balance
 * @property string $current_balance
 * @property string $currency
 * @property string $color
 * @property bool $is_active
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Account extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'type',
        'account_number',
        'initial_balance',
        'current_balance',
        'currency',
        'color',
        'is_active',
        'notes',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'type' => AccountType::class,
            'initial_balance' => 'decimal:2',
            'current_balance' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    /**
     * @return HasMany<Transaction, $this>
     */
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'account_id');
    }

    /**
     * @return HasMany<Transaction, $this>
     */
    public function incomingTransfers(): HasMany
    {
        return $this->hasMany(Transaction::class, 'to_account_id');
    }

    /**
     * Recalculate and update the current balance based on all ledger activity.
     */
    public function recalculateBalance(): void
    {
        $income = (float) $this->transactions()
            ->where('type', TransactionType::Income->value)
            ->sum('amount');

        $expense = (float) $this->transactions()
            ->where('type', TransactionType::Expense->value)
            ->sum('amount');

        $transfersOut = (float) $this->transactions()
            ->where('type', TransactionType::Transfer->value)
            ->sum('amount');

        $transfersIn = (float) $this->incomingTransfers()
            ->where('type', TransactionType::Transfer->value)
            ->sum('amount');

        $computedBalance = (float) $this->initial_balance + $income - $expense - $transfersOut + $transfersIn;

        $this->update(['current_balance' => $computedBalance]);
    }
}
