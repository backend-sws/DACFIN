@extends('layouts.app')

@section('title', 'Transactions History')
@section('page-title', 'Transactions Ledger')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-white">Transactions History</h2>
            <p class="text-xs text-slate-400">Complete record of all incomes, expenses and transfers</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button onclick="openTransactionModal('income')" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 hover:bg-emerald-500/20 transition flex items-center gap-1.5">
                <i data-lucide="plus" class="w-3.5 h-3.5"></i> Add Income
            </button>
            <button onclick="openTransactionModal('expense')" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20 hover:bg-rose-500/20 transition flex items-center gap-1.5">
                <i data-lucide="minus" class="w-3.5 h-3.5"></i> Add Expense
            </button>
            <button onclick="openTransferModal()" class="px-3.5 py-2 rounded-xl text-xs font-semibold bg-sky-500/10 text-sky-400 border border-sky-500/20 hover:bg-sky-500/20 transition flex items-center gap-1.5">
                <i data-lucide="arrow-right-left" class="w-3.5 h-3.5"></i> Transfer
            </button>
        </div>
    </div>

    <!-- Filters Section -->
    <div class="glass-panel p-4 rounded-2xl border border-slate-800">
        <form method="GET" action="{{ route('transactions.index') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-6 gap-3 items-end">
            
            <!-- Search Text -->
            <div class="md:col-span-2">
                <label class="block text-xs font-medium text-slate-400 mb-1">Search Description / ID</label>
                <div class="relative">
                    <i data-lucide="search" class="w-4 h-4 text-slate-500 absolute left-3 top-1/2 -translate-y-1/2"></i>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search description, reference..." class="w-full pl-9 pr-3 py-2 text-xs rounded-xl bg-slate-900 border border-slate-700/80 text-slate-100 placeholder-slate-500 focus:border-emerald-500">
                </div>
            </div>

            <!-- Type Filter -->
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Type</label>
                <select name="type" class="w-full px-3 py-2 text-xs rounded-xl bg-slate-900 border border-slate-700/80 text-slate-200 focus:border-emerald-500">
                    <option value="">All Types</option>
                    @foreach($transactionTypes as $type)
                        <option value="{{ $type->value }}" {{ request('type') === $type->value ? 'selected' : '' }}>
                            {{ $type->label() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Account Filter -->
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Account</label>
                <select name="account_id" class="w-full px-3 py-2 text-xs rounded-xl bg-slate-900 border border-slate-700/80 text-slate-200 focus:border-emerald-500">
                    <option value="">All Accounts</option>
                    @foreach($accounts as $acc)
                        <option value="{{ $acc->id }}" {{ request('account_id') == $acc->id ? 'selected' : '' }}>
                            {{ $acc->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Category Filter -->
            <div>
                <label class="block text-xs font-medium text-slate-400 mb-1">Category</label>
                <select name="category_id" class="w-full px-3 py-2 text-xs rounded-xl bg-slate-900 border border-slate-700/80 text-slate-200 focus:border-emerald-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Filter Buttons -->
            <div class="flex items-center gap-2">
                <button type="submit" class="flex-1 py-2 px-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs flex items-center justify-center gap-1.5 transition">
                    <i data-lucide="filter" class="w-3.5 h-3.5"></i> Filter
                </button>
                <a href="{{ route('transactions.index') }}" class="py-2 px-3 rounded-xl bg-slate-800 hover:bg-slate-700 text-slate-300 font-semibold text-xs transition">
                    Reset
                </a>
            </div>
        </form>
    </div>

    <!-- Transactions Table -->
    <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-900/60 text-slate-400 border-b border-slate-800 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-3 px-4">Date</th>
                        <th class="py-3 px-4">Description</th>
                        <th class="py-3 px-4">Account</th>
                        <th class="py-3 px-4">Category</th>
                        <th class="py-3 px-4 text-right">Amount</th>
                        <th class="py-3 px-4 text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($transactions as $txn)
                        <tr class="hover:bg-slate-900/40 transition">
                            <td class="py-3 px-4 font-mono text-slate-300 whitespace-nowrap">
                                {{ $txn->date->format('d M Y') }}
                            </td>
                            <td class="py-3 px-4">
                                <div class="font-semibold text-slate-100">{{ $txn->description }}</div>
                                @if($txn->reference_number)
                                    <div class="text-[10px] text-slate-500 font-mono">Ref: {{ $txn->reference_number }}</div>
                                @endif
                                @if($txn->notes)
                                    <div class="text-[11px] text-slate-400 italic">{{ $txn->notes }}</div>
                                @endif
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                <span class="inline-flex items-center gap-1.5 font-medium text-slate-200">
                                    <span class="w-2 h-2 rounded-full" style="background-color: {{ $txn->account->color }}"></span>
                                    {{ $txn->account->name }}
                                    @if($txn->toAccount)
                                        <i data-lucide="arrow-right" class="w-3.5 h-3.5 text-sky-400"></i>
                                        <span class="w-2 h-2 rounded-full" style="background-color: {{ $txn->toAccount->color }}"></span>
                                        {{ $txn->toAccount->name }}
                                    @endif
                                </span>
                            </td>
                            <td class="py-3 px-4 whitespace-nowrap">
                                @if($txn->category)
                                    <span class="px-2.5 py-1 rounded-lg text-[11px] font-semibold inline-flex items-center gap-1" style="background-color: {{ $txn->category->color }}20; color: {{ $txn->category->color }};">
                                        {{ $txn->category->name }}
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-lg text-[11px] font-semibold bg-sky-500/20 text-sky-400 inline-flex items-center gap-1">
                                        <i data-lucide="arrow-right-left" class="w-3 h-3"></i> Transfer
                                    </span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-right whitespace-nowrap">
                                <span class="font-black text-sm {{ $txn->type === \App\Enums\TransactionType::Income ? 'text-emerald-400' : ($txn->type === \App\Enums\TransactionType::Expense ? 'text-rose-400' : 'text-sky-400') }}">
                                    {{ $txn->type === \App\Enums\TransactionType::Income ? '+' : ($txn->type === \App\Enums\TransactionType::Expense ? '-' : '⇄') }}₹{{ number_format($txn->amount, 2) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 text-center whitespace-nowrap">
                                <form action="{{ route('transactions.destroy', $txn) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this transaction? Balance will be adjusted.')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-500 hover:text-rose-400 rounded-lg hover:bg-rose-500/10 transition" title="Delete">
                                        <i data-lucide="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-12 text-center text-slate-500">
                                <div class="flex flex-col items-center justify-center gap-2">
                                    <i data-lucide="inbox" class="w-8 h-8 stroke-1 text-slate-600"></i>
                                    <p>No transactions found matching your criteria.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($transactions->hasPages())
            <div class="p-4 border-t border-slate-800 bg-slate-900/40">
                {{ $transactions->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
