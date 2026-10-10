<?php

namespace App\Http\Controllers;

use App\Enums\AccountType;
use App\Enums\TransactionType;
use App\Http\Requests\StoreAccountRequest;
use App\Models\Account;
use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    /**
     * Display a listing of accounts.
     */
    public function index(): View
    {
        $accounts = Account::withCount('transactions')->orderBy('name')->get();
        $totalBalance = (float) $accounts->sum('current_balance');
        $accountTypes = AccountType::cases();

        return view('finance.accounts.index', compact('accounts', 'totalBalance', 'accountTypes'));
    }

    /**
     * Store a newly created account.
     */
    public function store(StoreAccountRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['current_balance'] = $validated['initial_balance'];

        Account::create($validated);

        return redirect()->route('accounts.index')->with('success', 'Account created successfully!');
    }

    /**
     * Update the specified account.
     */
    public function update(StoreAccountRequest $request, Account $account): RedirectResponse
    {
        $validated = $request->validated();
        $account->update($validated);
        $account->recalculateBalance();

        return redirect()->route('accounts.index')->with('success', 'Account updated successfully!');
    }

    /**
     * Remove the specified account.
     */
    public function destroy(Account $account): RedirectResponse
    {
        if ($account->transactions()->exists() || $account->incomingTransfers()->exists()) {
            return redirect()->route('accounts.index')->with('error', 'Cannot delete account with existing transactions. Deactivate it instead.');
        }

        $account->delete();

        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }

    /**
     * Transfer funds between two accounts.
     */
    public function transfer(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'from_account_id' => ['required', 'exists:accounts,id'],
            'to_account_id' => ['required', 'different:from_account_id', 'exists:accounts,id'],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
        ]);

        DB::transaction(function () use ($validated): void {
            Transaction::create([
                'account_id' => $validated['from_account_id'],
                'to_account_id' => $validated['to_account_id'],
                'category_id' => null,
                'type' => TransactionType::Transfer,
                'amount' => $validated['amount'],
                'date' => $validated['date'],
                'description' => $validated['description'],
            ]);

            $from = Account::find($validated['from_account_id']);
            $to = Account::find($validated['to_account_id']);

            $from?->recalculateBalance();
            $to?->recalculateBalance();
        });

        return redirect()->back()->with('success', 'Funds transferred successfully!');
    }
}
