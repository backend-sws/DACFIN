@extends('layouts.app')

@section('title', 'Accounts & Wallets')
@section('page-title', 'Accounts Management')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-white">Accounts & Wallets</h2>
            <p class="text-xs text-slate-400">Manage bank accounts, credit cards, and cash wallets</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button onclick="openAddAccountModal()" class="px-4 py-2 rounded-xl text-xs font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition flex items-center gap-1.5 shadow-md shadow-emerald-500/20">
                <i data-lucide="plus-circle" class="w-4 h-4 stroke-[2.5]"></i> Add New Account
            </button>
            <button onclick="openTransferModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-sky-500/10 text-sky-400 border border-sky-500/20 hover:bg-sky-500/20 transition flex items-center gap-1.5">
                <i data-lucide="arrow-right-left" class="w-3.5 h-3.5"></i> Transfer Funds
            </button>
        </div>
    </div>

    <!-- Accounts Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($accounts as $acc)
            <div class="glass-card p-5 rounded-2xl relative overflow-hidden group hover:border-slate-600 transition flex flex-col justify-between">
                <div class="flex items-start justify-between">
                    <div>
                        <span class="px-2.5 py-1 rounded-md text-[10px] font-bold uppercase tracking-wider" style="background-color: {{ $acc->color }}20; color: {{ $acc->color }}; border: 1px solid {{ $acc->color }}40;">
                            {{ $acc->type->label() }}
                        </span>
                        <h3 class="mt-2 text-base font-bold text-white">{{ $acc->name }}</h3>
                        @if($acc->account_number)
                            <p class="text-xs font-mono text-slate-400 mt-0.5">A/C: {{ $acc->account_number }}</p>
                        @endif
                    </div>
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background-color: {{ $acc->color }}20; color: {{ $acc->color }};">
                        <i data-lucide="landmark" class="w-4 h-4"></i>
                    </div>
                </div>

                <div class="mt-6 pt-4 border-t border-slate-800/80 flex items-end justify-between">
                    <div>
                        <span class="text-[11px] text-slate-400">Current Balance</span>
                        <div class="text-xl font-extrabold text-white">
                            ₹{{ number_format($acc->current_balance, 2) }}
                        </div>
                    </div>
                    <div class="text-right">
                        <span class="text-[10px] text-slate-500 font-mono">{{ $acc->transactions_count }} txns</span>
                    </div>
                </div>

                <!-- Card action buttons -->
                <div class="mt-3 pt-2 flex items-center justify-end gap-2 text-xs">
                    <form action="{{ route('accounts.destroy', $acc) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this account?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1 text-slate-500 hover:text-rose-400" title="Delete Account">
                            <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Accounts Detailed Table -->
    <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
        <div class="p-4 border-b border-slate-800 flex items-center justify-between">
            <h3 class="font-bold text-sm text-slate-200">All Accounts Ledger Summary</h3>
            <span class="text-xs text-slate-400">Total Net Worth: <strong class="text-emerald-400 font-bold">₹{{ number_format($totalBalance, 2) }}</strong></span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-900/60 text-slate-400 border-b border-slate-800 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-3 px-4">Account Name</th>
                        <th class="py-3 px-4">Type</th>
                        <th class="py-3 px-4">Account Number</th>
                        <th class="py-3 px-4 text-right">Opening Balance</th>
                        <th class="py-3 px-4 text-right">Current Balance</th>
                        <th class="py-3 px-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @foreach($accounts as $acc)
                        <tr class="hover:bg-slate-900/40 transition">
                            <td class="py-3 px-4 font-semibold text-slate-100 flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full" style="background-color: {{ $acc->color }}"></span>
                                {{ $acc->name }}
                            </td>
                            <td class="py-3 px-4 text-slate-300">
                                {{ $acc->type->label() }}
                            </td>
                            <td class="py-3 px-4 font-mono text-slate-400">
                                {{ $acc->account_number ?? 'N/A' }}
                            </td>
                            <td class="py-3 px-4 text-right font-mono text-slate-400">
                                ₹{{ number_format($acc->initial_balance, 2) }}
                            </td>
                            <td class="py-3 px-4 text-right font-bold text-white text-sm">
                                ₹{{ number_format($acc->current_balance, 2) }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                @if($acc->is_active)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Active</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-800 text-slate-400">Disabled</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Add New Account -->
<div id="addAccountModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="glass-panel w-full max-w-md rounded-2xl p-6 shadow-2xl border border-slate-700/60">
        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                    <i data-lucide="landmark" class="w-4 h-4"></i>
                </div>
                <h3 class="font-bold text-lg text-slate-100">Add New Account</h3>
            </div>
            <button onclick="closeAddAccountModal()" class="text-slate-400 hover:text-white p-1 rounded-lg">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form action="{{ route('accounts.store') }}" method="POST" class="mt-4 space-y-4">
            @csrf
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Account Name *</label>
                <input type="text" name="name" required placeholder="e.g. HDFC Salary Account, Cash Wallet" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Account Type *</label>
                <select name="type" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                    @foreach($accountTypes as $t)
                        <option value="{{ $t->value }}">{{ $t->label() }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Account Number (Optional)</label>
                <input type="text" name="account_number" placeholder="e.g. 50100482910" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Opening Balance (₹) *</label>
                    <input type="number" step="0.01" name="initial_balance" value="0.00" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Currency</label>
                    <input type="text" name="currency" value="₹" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Theme Color</label>
                    <input type="color" name="color" value="#2563eb" class="w-full h-10 rounded-xl bg-slate-900 border border-slate-700 cursor-pointer">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Notes</label>
                    <input type="text" name="notes" placeholder="Optional notes" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <button type="button" onclick="closeAddAccountModal()" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition">
                    Save Account
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddAccountModal() {
        document.getElementById('addAccountModal').classList.remove('hidden');
    }
    function closeAddAccountModal() {
        document.getElementById('addAccountModal').classList.add('hidden');
    }
</script>
@endsection
