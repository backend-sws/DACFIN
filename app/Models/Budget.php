<?php

namespace App\Models;

use App\Enums\TransactionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Budget
 *
 * @property int $id
 * @property int $category_id
 * @property string $amount
 * @property string $month_year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Budget extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'category_id',
        'amount',
        'month_year',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
        ];
    }

    /**
     * @return BelongsTo<Category, $this>
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the spent amount for this budget's category in this month.
     */
    public function getSpentAmount(): float
    {
        [$year, $month] = explode('-', $this->month_year);

        return (float) Transaction::query()
            ->where('category_id', $this->category_id)
            ->where('type', TransactionType::Expense->value)
            ->whereYear('date', (int) $year)
            ->whereMonth('date', (int) $month)
            ->sum('amount');
    }
}
