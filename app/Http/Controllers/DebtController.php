<?php

namespace App\Http\Controllers;

use App\Enums\DebtStatus;
use App\Enums\DebtType;
use App\Http\Requests\RecordDebtPaymentRequest;
use App\Http\Requests\StoreDebtRequest;
use App\Models\Debt;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DebtController extends Controller
{
    /**
     * Display a listing of debts and borrowings.
     */
    public function index(Request $request): View
    {
        $query = Debt::query()->orderByDesc('created_at');

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        $debts = $query->get();

        $totalLent = (float) Debt::where('type', DebtType::Lent->value)->sum('amount');
        $recoveredLent = (float) Debt::where('type', DebtType::Lent->value)->sum('paid_amount');
        $remainingLent = max(0.0, $totalLent - $recoveredLent);

        $totalBorrowed = (float) Debt::where('type', DebtType::Borrowed->value)->sum('amount');
        $repaidBorrowed = (float) Debt::where('type', DebtType::Borrowed->value)->sum('paid_amount');
        $remainingBorrowed = max(0.0, $totalBorrowed - $repaidBorrowed);

        $debtTypes = DebtType::cases();
        $debtStatuses = DebtStatus::cases();

        return view('finance.debts.index', compact(
            'debts',
            'totalLent',
            'recoveredLent',
            'remainingLent',
            'totalBorrowed',
            'repaidBorrowed',
            'remainingBorrowed',
            'debtTypes',
            'debtStatuses'
        ));
    }

    /**
     * Store a newly created debt record.
     */
    public function store(StoreDebtRequest $request): RedirectResponse
    {
        Debt::create($request->validated());

        return redirect()->route('debts.index')->with('success', 'Debt record added successfully!');
    }

    /**
     * Update the specified debt.
     */
    public function update(StoreDebtRequest $request, Debt $debt): RedirectResponse
    {
        $debt->update($request->validated());

        return redirect()->route('debts.index')->with('success', 'Debt record updated successfully!');
    }

    /**
     * Record a payment against the debt.
     */
    public function recordPayment(RecordDebtPaymentRequest $request, Debt $debt): RedirectResponse
    {
        $debt->recordPayment((float) $request->validated('amount'));

        return redirect()->route('debts.index')->with('success', 'Payment recorded successfully!');
    }

    /**
     * Remove the specified debt.
     */
    public function destroy(Debt $debt): RedirectResponse
    {
        $debt->delete();

        return redirect()->route('debts.index')->with('success', 'Debt record deleted.');
    }
}
