@extends('layouts.app')

@section('title', 'Debts & Loans')
@section('page-title', 'Borrowing & Lending Ledger')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-white">Debts & Loans Ledger</h2>
            <p class="text-xs text-slate-400">Track money lent to people (Udhaar / Receivable) and borrowed (Payable)</p>
        </div>
        <button onclick="openAddDebtModal()" class="px-4 py-2 rounded-xl text-xs font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition flex items-center gap-1.5 shadow-md shadow-emerald-500/20">
            <i data-lucide="plus-circle" class="w-4 h-4 stroke-[2.5]"></i> Add Debt Record
        </button>
    </div>

    <!-- Summary Metrics -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Money Lent (Receivable) -->
        <div class="glass-card p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Money Lent (Receivable)</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3 text-2xl font-black text-emerald-400">
                ₹{{ number_format($totalLent, 2) }}
            </div>
            <div class="mt-1 text-xs text-slate-400">
                Recovered: <strong class="text-slate-200">₹{{ number_format($recoveredLent, 2) }}</strong>
            </div>
        </div>

        <!-- Pending to Collect -->
        <div class="glass-card p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Pending to Collect</span>
                <div class="w-8 h-8 rounded-xl bg-teal-500/10 text-teal-400 flex items-center justify-center">
                    <i data-lucide="hand-coins" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3 text-2xl font-black text-teal-300">
                ₹{{ number_format($remainingLent, 2) }}
            </div>
            <div class="mt-1 text-xs text-slate-400">Uncollected from borrowers</div>
        </div>

        <!-- Money Borrowed (Payable) -->
        <div class="glass-card p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Money Borrowed (Payable)</span>
                <div class="w-8 h-8 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center">
                    <i data-lucide="arrow-down-left" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3 text-2xl font-black text-rose-400">
                ₹{{ number_format($totalBorrowed, 2) }}
            </div>
            <div class="mt-1 text-xs text-slate-400">
                Repaid: <strong class="text-slate-200">₹{{ number_format($repaidBorrowed, 2) }}</strong>
            </div>
        </div>

        <!-- Pending to Repay -->
        <div class="glass-card p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Pending to Repay</span>
                <div class="w-8 h-8 rounded-xl bg-amber-500/10 text-amber-400 flex items-center justify-center">
                    <i data-lucide="clock" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3 text-2xl font-black text-amber-300">
                ₹{{ number_format($remainingBorrowed, 2) }}
            </div>
            <div class="mt-1 text-xs text-slate-400">Outstanding liabilities</div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="glass-panel p-4 rounded-2xl border border-slate-800 flex items-center justify-between gap-4 flex-wrap">
        <div class="flex items-center gap-2">
            <a href="{{ route('debts.index') }}" class="px-3 py-1.5 rounded-xl text-xs font-semibold {{ !request('type') ? 'bg-slate-800 text-white border border-slate-700' : 'text-slate-400 hover:text-slate-200' }}">
                All Records
            </a>
            <a href="{{ route('debts.index', ['type' => 'lent']) }}" class="px-3 py-1.5 rounded-xl text-xs font-semibold {{ request('type') === 'lent' ? 'bg-emerald-500/20 text-emerald-400 border border-emerald-500/30' : 'text-slate-400 hover:text-slate-200' }}">
                Lent (Receivable)
            </a>
            <a href="{{ route('debts.index', ['type' => 'borrowed']) }}" class="px-3 py-1.5 rounded-xl text-xs font-semibold {{ request('type') === 'borrowed' ? 'bg-rose-500/20 text-rose-400 border border-rose-500/30' : 'text-slate-400 hover:text-slate-200' }}">
                Borrowed (Payable)
            </a>
        </div>
    </div>

    <!-- Debts Table -->
    <div class="glass-panel rounded-2xl border border-slate-800 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead>
                    <tr class="bg-slate-900/60 text-slate-400 border-b border-slate-800 font-bold uppercase tracking-wider text-[11px]">
                        <th class="py-3 px-4">Person / Entity</th>
                        <th class="py-3 px-4">Type</th>
                        <th class="py-3 px-4 text-right">Total Amount</th>
                        <th class="py-3 px-4 text-right">Paid / Settled</th>
                        <th class="py-3 px-4 text-right">Remaining Due</th>
                        <th class="py-3 px-4">Due Date</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800/60">
                    @forelse($debts as $debt)
                        <tr class="hover:bg-slate-900/40 transition">
                            <td class="py-3.5 px-4 font-semibold text-slate-100">
                                <div>{{ $debt->person_name }}</div>
                                @if($debt->phone)
                                    <div class="text-[11px] font-mono text-slate-400">{{ $debt->phone }}</div>
                                @endif
                                @if($debt->notes)
                                    <div class="text-[10px] text-slate-500 italic mt-0.5">{{ $debt->notes }}</div>
                                @endif
                            </td>
                            <td class="py-3.5 px-4">
                                @if($debt->type === \App\Enums\DebtType::Lent)
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">
                                        Lent (You will receive)
                                    </span>
                                @else
                                    <span class="px-2.5 py-1 rounded-md text-[10px] font-bold bg-rose-500/10 text-rose-400 border border-rose-500/20">
                                        Borrowed (You owe)
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right font-bold text-white">
                                ₹{{ number_format($debt->amount, 2) }}
                            </td>
                            <td class="py-3.5 px-4 text-right font-mono text-slate-400">
                                ₹{{ number_format($debt->paid_amount, 2) }}
                            </td>
                            <td class="py-3.5 px-4 text-right font-extrabold text-amber-300">
                                ₹{{ number_format($debt->getRemainingAmount(), 2) }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-400 font-mono">
                                {{ $debt->due_date ? $debt->due_date->format('d M Y') : 'No due date' }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if($debt->status === \App\Enums\DebtStatus::Settled)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/20 text-emerald-400">Settled</span>
                                @elseif($debt->status === \App\Enums\DebtStatus::Partial)
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-500/20 text-amber-400">Partial</span>
                                @else
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-slate-800 text-slate-400">Pending</span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-center space-x-1 whitespace-nowrap">
                                @if($debt->status !== \App\Enums\DebtStatus::Settled)
                                    <button onclick="openPaymentModal({{ $debt->id }}, '{{ addslashes($debt->person_name) }}', {{ $debt->getRemainingAmount() }})" 
                                            class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-emerald-500/20 text-emerald-400 hover:bg-emerald-500/30 transition">
                                        Pay / Collect
                                    </button>
                                @endif
                                <form action="{{ route('debts.destroy', $debt) }}" method="POST" onsubmit="return confirm('Delete this debt record?')" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1 text-slate-500 hover:text-rose-400" title="Delete">
                                        <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-10 text-center text-slate-500">
                                No debt records found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Add Debt Record -->
<div id="addDebtModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="glass-panel w-full max-w-md rounded-2xl p-6 shadow-2xl border border-slate-700/60">
        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                    <i data-lucide="hand-coins" class="w-4 h-4"></i>
                </div>
                <h3 class="font-bold text-lg text-slate-100">Add Debt / Loan Record</h3>
            </div>
            <button onclick="closeAddDebtModal()" class="text-slate-400 hover:text-white p-1 rounded-lg">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form action="{{ route('debts.store') }}" method="POST" class="mt-4 space-y-4">
            @csrf
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Person / Company Name *</label>
                <input type="text" name="person_name" required placeholder="e.g. Ramesh Kumar, ABC Corp" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Phone Number (Optional)</label>
                <input type="text" name="phone" placeholder="e.g. 9876543210" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Type *</label>
                <select name="type" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                    @foreach($debtTypes as $t)
                        <option value="{{ $t->value }}">{{ $t->label() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Total Amount (₹) *</label>
                    <input type="number" step="0.01" name="amount" required placeholder="0.00" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm font-semibold">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Due Date (Optional)</label>
                    <input type="date" name="due_date" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Notes / Purpose</label>
                <input type="text" name="notes" placeholder="e.g. Friendly emergency loan" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <button type="button" onclick="closeAddDebtModal()" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition">
                    Save Record
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal: Record Payment -->
<div id="paymentModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="glass-panel w-full max-w-sm rounded-2xl p-6 shadow-2xl border border-slate-700/60">
        <div class="flex items-center justify-between pb-3 border-b border-slate-800">
            <h3 class="font-bold text-base text-slate-100">Record Settlement Payment</h3>
            <button onclick="closePaymentModal()" class="text-slate-400 hover:text-white">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form id="paymentForm" method="POST" class="mt-4 space-y-4">
            @csrf
            <div>
                <span class="text-xs text-slate-400">Settlement for:</span>
                <div id="paymentPersonName" class="font-bold text-white text-sm"></div>
                <div class="text-xs text-amber-400 mt-1">Due Remaining: <span id="paymentRemainingDue" class="font-bold"></span></div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Payment Amount (₹) *</label>
                <input id="paymentAmountInput" type="number" step="0.01" name="amount" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm font-semibold">
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <button type="button" onclick="closePaymentModal()" class="px-4 py-2 text-xs font-semibold text-slate-400 hover:text-white">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2 text-xs font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 rounded-xl transition">
                    Record Payment
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddDebtModal() {
        document.getElementById('addDebtModal').classList.remove('hidden');
    }
    function closeAddDebtModal() {
        document.getElementById('addDebtModal').classList.add('hidden');
    }

    function openPaymentModal(debtId, personName, remainingDue) {
        document.getElementById('paymentForm').action = `/debts/${debtId}/payment`;
        document.getElementById('paymentPersonName').innerText = personName;
        document.getElementById('paymentRemainingDue').innerText = '₹' + Number(remainingDue).toFixed(2);
        document.getElementById('paymentAmountInput').value = remainingDue;
        document.getElementById('paymentModal').classList.remove('hidden');
    }
    function closePaymentModal() {
        document.getElementById('paymentModal').classList.add('hidden');
    }
</script>
@endsection
