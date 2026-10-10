<?php

namespace App\Http\Controllers;

use App\Enums\TransactionType;
use App\Http\Requests\StoreTransactionRequest;
use App\Models\Account;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of transactions.
     */
    public function index(Request $request): View
    {
        $query = Transaction::with(['account', 'toAccount', 'category'])
            ->orderByDesc('date')
            ->orderByDesc('id');

        if ($request->filled('type')) {
            $query->where('type', $request->input('type'));
        }

        if ($request->filled('account_id')) {
            $accountId = $request->input('account_id');
            $query->where(function ($q) use ($accountId): void {
                $q->where('account_id', $accountId)
                    ->orWhere('to_account_id', $accountId);
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->input('category_id'));
        }

        if ($request->filled('start_date')) {
            $query->whereDate('date', '>=', $request->input('start_date'));
        }

        if ($request->filled('end_date')) {
            $query->whereDate('date', '<=', $request->input('end_date'));
        }

        if ($request->filled('search')) {
            $search = '%'.$request->input('search').'%';
            $query->where(function ($q) use ($search): void {
                $q->where('description', 'like', $search)
                    ->orWhere('reference_number', 'like', $search);
            });
        }

        $transactions = $query->paginate(15)->withQueryString();

        $accounts = Account::where('is_active', true)->orderBy('name')->get();
        $categories = Category::orderBy('name')->get();
        $transactionTypes = TransactionType::cases();

        return view('finance.transactions.index', compact('transactions', 'accounts', 'categories', 'transactionTypes'));
    }

    /**
     * Store a newly created transaction.
     */
    public function store(StoreTransactionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($validated): void {
            $transaction = Transaction::create($validated);

            $account = Account::find($transaction->account_id);
            $account?->recalculateBalance();

            if ($transaction->to_account_id) {
                $toAccount = Account::find($transaction->to_account_id);
                $toAccount?->recalculateBalance();
            }
        });

        return redirect()->back()->with('success', 'Transaction recorded successfully!');
    }

    /**
     * Update the specified transaction.
     */
    public function update(StoreTransactionRequest $request, Transaction $transaction): RedirectResponse
    {
        $validated = $request->validated();
        $oldAccountId = $transaction->account_id;
        $oldToAccountId = $transaction->to_account_id;

        DB::transaction(function () use ($transaction, $validated, $oldAccountId, $oldToAccountId): void {
            $transaction->update($validated);

            Account::find($oldAccountId)?->recalculateBalance();
            Account::find($transaction->account_id)?->recalculateBalance();

            if ($oldToAccountId) {
                Account::find($oldToAccountId)?->recalculateBalance();
            }
            if ($transaction->to_account_id) {
                Account::find($transaction->to_account_id)?->recalculateBalance();
            }
        });

        return redirect()->back()->with('success', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified transaction.
     */
    public function destroy(Transaction $transaction): RedirectResponse
    {
        $accountId = $transaction->account_id;
        $toAccountId = $transaction->to_account_id;

        DB::transaction(function () use ($transaction, $accountId, $toAccountId): void {
            $transaction->delete();

            Account::find($accountId)?->recalculateBalance();
            if ($toAccountId) {
                Account::find($toAccountId)?->recalculateBalance();
            }
        });

        return redirect()->back()->with('success', 'Transaction deleted successfully.');
    }
}
