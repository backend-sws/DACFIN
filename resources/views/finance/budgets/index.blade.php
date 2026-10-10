@extends('layouts.app')

@section('title', 'Monthly Budgets')
@section('page-title', 'Budget Planning')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-white">Monthly Expense Budgets</h2>
            <p class="text-xs text-slate-400">Keep spending in control with category-wise limits</p>
        </div>
        <div class="flex items-center gap-3">
            <!-- Month Selector Form -->
            <form method="GET" action="{{ route('budgets.index') }}" class="flex items-center gap-2">
                <input type="month" name="month" value="{{ $selectedMonth }}" onchange="this.form.submit()" class="px-3 py-1.5 text-xs rounded-xl bg-slate-900 border border-slate-700 text-slate-100 font-semibold focus:border-emerald-500">
            </form>
            <button onclick="openSetBudgetModal()" class="px-4 py-2 rounded-xl text-xs font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition flex items-center gap-1.5 shadow-md shadow-emerald-500/20">
                <i data-lucide="plus-circle" class="w-4 h-4 stroke-[2.5]"></i> Set Category Budget
            </button>
        </div>
    </div>

    <!-- Summary Overview Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="glass-card p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Budgeted</span>
                <div class="w-8 h-8 rounded-xl bg-sky-500/10 text-sky-400 flex items-center justify-center">
                    <i data-lucide="target" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3 text-2xl font-black text-white">
                ₹{{ number_format($totalBudget, 2) }}
            </div>
            <div class="mt-1 text-xs text-slate-400">Allocated for {{ \Carbon\Carbon::parse($selectedMonth.'-01')->format('F Y') }}</div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Spent</span>
                <div class="w-8 h-8 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center">
                    <i data-lucide="credit-card" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3 text-2xl font-black text-rose-400">
                ₹{{ number_format($totalSpent, 2) }}
            </div>
            <div class="mt-1 text-xs text-slate-400">Actual expenses incurred</div>
        </div>

        <div class="glass-card p-5 rounded-2xl border border-slate-800">
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Remaining Buffer</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                    <i data-lucide="shield-check" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3 text-2xl font-black {{ ($totalBudget - $totalSpent) >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
                ₹{{ number_format($totalBudget - $totalSpent, 2) }}
            </div>
            <div class="mt-1 text-xs text-slate-400">Available to spend safely</div>
        </div>
    </div>

    <!-- Budgets List Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach($budgetItems as $item)
            <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex flex-col justify-between hover:border-slate-700 transition">
                <div>
                    <div class="flex items-center justify-between mb-3">
                        <div class="flex items-center gap-2.5">
                            <span class="w-3.5 h-3.5 rounded-full shrink-0" style="background-color: {{ $item['category_color'] }}"></span>
                            <h3 class="font-bold text-sm text-slate-100">{{ $item['category_name'] }}</h3>
                        </div>
                        @if($item['has_budget'])
                            @if($item['is_exceeded'])
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-rose-500/20 text-rose-400 border border-rose-500/30">Exceeded</span>
                            @elseif($item['percent'] >= 80)
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-500/20 text-amber-400 border border-amber-500/30">Near Limit</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-emerald-500/20 text-emerald-400 border border-emerald-500/30">Healthy</span>
                            @endif
                        @else
                            <span class="px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-800 text-slate-400">No Budget Set</span>
                        @endif
                    </div>

                    <div class="space-y-2 mt-4">
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-400">Spent: <strong class="text-white font-mono">₹{{ number_format($item['spent'], 2) }}</strong></span>
                            <span class="text-slate-400">Budget: <strong class="text-white font-mono">₹{{ number_format($item['budget_amount'], 2) }}</strong></span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full h-2.5 rounded-full bg-slate-800 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-500 {{ $item['is_exceeded'] ? 'bg-rose-500' : ($item['percent'] >= 80 ? 'bg-amber-500' : 'bg-emerald-500') }}"
                                 style="width: {{ $item['has_budget'] ? $item['percent'] : 0 }}%;">
                            </div>
                        </div>

                        <div class="flex items-center justify-between text-[11px] text-slate-400 pt-1">
                            <span>{{ $item['has_budget'] ? $item['percent'] : 0 }}% used</span>
                            @if($item['has_budget'])
                                <span>₹{{ number_format(abs($item['remaining']), 2) }} {{ $item['is_exceeded'] ? 'overspent' : 'remaining' }}</span>
                            @else
                                <span>-</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="mt-4 pt-3 border-t border-slate-800/80 flex items-center justify-end gap-2">
                    <button onclick="setCategoryBudget({{ $item['category_id'] }}, {{ $item['budget_amount'] }})" class="px-3 py-1 text-xs font-semibold rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-200 transition">
                        Edit Budget
                    </button>
                    @if($item['budget_id'])
                        <form action="{{ route('budgets.destroy', $item['budget_id']) }}" method="POST" onsubmit="return confirm('Remove budget limit for this category?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="p-1 text-slate-500 hover:text-rose-400" title="Delete Budget">
                                <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal: Set Category Budget -->
<div id="setBudgetModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="glass-panel w-full max-w-md rounded-2xl p-6 shadow-2xl border border-slate-700/60">
        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                    <i data-lucide="pie-chart" class="w-4 h-4"></i>
                </div>
                <h3 class="font-bold text-lg text-slate-100">Set Monthly Budget</h3>
            </div>
            <button onclick="closeSetBudgetModal()" class="text-slate-400 hover:text-white p-1 rounded-lg">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form action="{{ route('budgets.store') }}" method="POST" class="mt-4 space-y-4">
            @csrf
            <input type="hidden" name="month_year" value="{{ $selectedMonth }}">

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Category *</label>
                <select id="modalCategoryId" name="category_id" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Monthly Limit Amount (₹) *</label>
                <input id="modalBudgetAmount" type="number" step="0.01" name="amount" required placeholder="0.00" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm font-semibold">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Month</label>
                <input type="text" readonly value="{{ \Carbon\Carbon::parse($selectedMonth.'-01')->format('F Y') }}" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-800/60 border border-slate-700 text-slate-400 text-sm">
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <button type="button" onclick="closeSetBudgetModal()" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition">
                    Save Budget Limit
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openSetBudgetModal() {
        document.getElementById('setBudgetModal').classList.remove('hidden');
    }
    function closeSetBudgetModal() {
        document.getElementById('setBudgetModal').classList.add('hidden');
    }
    function setCategoryBudget(catId, currentAmount) {
        document.getElementById('modalCategoryId').value = catId;
        document.getElementById('modalBudgetAmount').value = currentAmount > 0 ? currentAmount : '';
        openSetBudgetModal();
    }
</script>
@endsection
