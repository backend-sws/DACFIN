<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Http\Requests\StoreBudgetRequest;
use App\Models\Budget;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    /**
     * Display a listing of budgets.
     */
    public function index(Request $request): View
    {
        $selectedMonth = $request->input('month', Carbon::now()->format('Y-m'));

        $categories = Category::where('type', CategoryType::Expense->value)
            ->orderBy('name')
            ->get();

        $budgets = Budget::with('category')
            ->where('month_year', $selectedMonth)
            ->get()
            ->keyBy('category_id');

        $budgetItems = $categories->map(function (Category $category) use ($budgets, $selectedMonth): array {
            $budget = $budgets->get($category->id);
            $budgetAmount = $budget ? (float) $budget->amount : 0.0;

            [$year, $month] = explode('-', $selectedMonth);
            $spent = (float) $category->transactions()
                ->whereYear('date', (int) $year)
                ->whereMonth('date', (int) $month)
                ->sum('amount');

            $percent = $budgetAmount > 0 ? min(100, round(($spent / $budgetAmount) * 100)) : 0;
            $remaining = $budgetAmount > 0 ? $budgetAmount - $spent : 0;

            return [
                'budget_id' => $budget?->id,
                'category_id' => $category->id,
                'category_name' => $category->name,
                'category_color' => $category->color,
                'category_icon' => $category->icon,
                'budget_amount' => $budgetAmount,
                'spent' => $spent,
                'remaining' => $remaining,
                'percent' => $percent,
                'is_exceeded' => $budgetAmount > 0 && $spent > $budgetAmount,
                'has_budget' => $budget !== null,
            ];
        });

        $totalBudget = $budgetItems->sum('budget_amount');
        $totalSpent = $budgetItems->sum('spent');

        return view('finance.budgets.index', compact('budgetItems', 'totalBudget', 'totalSpent', 'selectedMonth', 'categories'));
    }

    /**
     * Store or update a category budget.
     */
    public function store(StoreBudgetRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Budget::updateOrCreate(
            [
                'category_id' => $validated['category_id'],
                'month_year' => $validated['month_year'],
            ],
            [
                'amount' => $validated['amount'],
            ]
        );

        return redirect()->route('budgets.index', ['month' => $validated['month_year']])
            ->with('success', 'Budget allocated successfully!');
    }

    /**
     * Remove the specified budget.
     */
    public function destroy(Budget $budget): RedirectResponse
    {
        $month = $budget->month_year;
        $budget->delete();

        return redirect()->route('budgets.index', ['month' => $month])
            ->with('success', 'Budget removed successfully.');
    }
}
