<?php

namespace App\Http\Controllers;

use App\Enums\DebtStatus;
use App\Enums\DebtType;
use App\Enums\TransactionType;
use App\Models\Account;
use App\Models\Budget;
use App\Models\Category;
use App\Models\Debt;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    /**
     * Display the primary financial dashboard.
     */
    public function index(): View
    {
        $currentMonth = Carbon::now()->format('Y-m');
        $currentYearInt = (int) Carbon::now()->year;
        $currentMonthInt = (int) Carbon::now()->month;

        $accounts = Account::where('is_active', true)->orderBy('name')->get();
        $netWorth = (float) $accounts->sum('current_balance');

        $monthlyIncome = (float) Transaction::where('type', TransactionType::Income->value)
            ->whereYear('date', $currentYearInt)
            ->whereMonth('date', $currentMonthInt)
            ->sum('amount');

        $monthlyExpense = (float) Transaction::where('type', TransactionType::Expense->value)
            ->whereYear('date', $currentYearInt)
            ->whereMonth('date', $currentMonthInt)
            ->sum('amount');

        $netSavings = $monthlyIncome - $monthlyExpense;

        // Pending debts
        $debts = Debt::whereIn('status', [DebtStatus::Pending->value, DebtStatus::Partial->value])->get();
        $pendingReceivable = 0.0;
        $pendingPayable = 0.0;
        foreach ($debts as $debt) {
            $remaining = $debt->getRemainingAmount();
            if ($debt->type === DebtType::Lent) {
                $pendingReceivable += $remaining;
            } else {
                $pendingPayable += $remaining;
            }
        }

        // Recent transactions
        $recentTransactions = Transaction::with(['account', 'toAccount', 'category'])
            ->orderByDesc('date')
            ->orderByDesc('id')
            ->limit(8)
            ->get();

        // Budgets for current month
        $budgets = Budget::with('category')
            ->where('month_year', $currentMonth)
            ->get()
            ->map(function (Budget $budget): array {
                $spent = $budget->getSpentAmount();
                $budgetAmount = (float) $budget->amount;
                $percent = $budgetAmount > 0 ? min(100, round(($spent / $budgetAmount) * 100)) : 0;

                return [
                    'category' => $budget->category->name,
                    'color' => $budget->category->color,
                    'icon' => $budget->category->icon,
                    'budget' => $budgetAmount,
                    'spent' => $spent,
                    'percent' => $percent,
                    'is_exceeded' => $spent > $budgetAmount,
                ];
            });

        // Last 6 months cashflow trend
        $monthlyTrends = [];
        for ($i = 5; $i >= 0; $i--) {
            $dt = Carbon::now()->subMonths($i);
            $y = (int) $dt->year;
            $m = (int) $dt->month;

            $inc = (float) Transaction::where('type', TransactionType::Income->value)
                ->whereYear('date', $y)
                ->whereMonth('date', $m)
                ->sum('amount');

            $exp = (float) Transaction::where('type', TransactionType::Expense->value)
                ->whereYear('date', $y)
                ->whereMonth('date', $m)
                ->sum('amount');

            $monthlyTrends[] = [
                'label' => $dt->format('M Y'),
                'income' => $inc,
                'expense' => $exp,
            ];
        }

        // Category breakdown for current month expense
        $categoryExpenses = Transaction::with('category')
            ->where('type', TransactionType::Expense->value)
            ->whereYear('date', $currentYearInt)
            ->whereMonth('date', $currentMonthInt)
            ->whereNotNull('category_id')
            ->get()
            ->groupBy('category_id')
            ->map(function ($items): array {
                $first = $items->first();
                $total = (float) $items->sum('amount');

                return [
                    'name' => $first->category->name,
                    'color' => $first->category->color,
                    'icon' => $first->category->icon,
                    'total' => $total,
                ];
            })
            ->sortByDesc('total')
            ->values();

        $allCategories = Category::orderBy('name')->get();

        return view('finance.dashboard', compact(
            'accounts',
            'netWorth',
            'monthlyIncome',
            'monthlyExpense',
            'netSavings',
            'pendingReceivable',
            'pendingPayable',
            'recentTransactions',
            'budgets',
            'monthlyTrends',
            'categoryExpenses',
            'allCategories'
        ));
    }
}
