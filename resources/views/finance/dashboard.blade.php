@extends('layouts.app')

@section('title', 'Financial Dashboard')
@section('page-title', 'Dashboard Overview')

@section('content')
<div class="space-y-6">

    <!-- Top Summary Metrics Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <!-- Total Net Worth Card -->
        <div class="glass-card p-5 rounded-2xl relative overflow-hidden group hover:border-emerald-500/40 transition">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-emerald-500/10 rounded-full blur-xl group-hover:bg-emerald-500/20 transition"></div>
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Total Net Worth</span>
                <div class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-400 flex items-center justify-center">
                    <i data-lucide="wallet" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3">
                <div class="text-2xl md:text-3xl font-extrabold tracking-tight text-white">
                    ₹{{ number_format($netWorth, 2) }}
                </div>
                <div class="mt-1 flex items-center gap-1.5 text-xs text-slate-400">
                    <span class="text-emerald-400 font-medium">{{ $accounts->count() }} Accounts Active</span>
                </div>
            </div>
        </div>

        <!-- Monthly Income Card -->
        <div class="glass-card p-5 rounded-2xl relative overflow-hidden group hover:border-teal-500/40 transition">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-teal-500/10 rounded-full blur-xl group-hover:bg-teal-500/20 transition"></div>
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Income (This Month)</span>
                <div class="w-8 h-8 rounded-xl bg-teal-500/10 text-teal-400 flex items-center justify-center">
                    <i data-lucide="arrow-down-left" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3">
                <div class="text-2xl md:text-3xl font-extrabold tracking-tight text-teal-300">
                    +₹{{ number_format($monthlyIncome, 2) }}
                </div>
                <div class="mt-1 text-xs text-slate-400">
                    Earnings for {{ now()->format('M Y') }}
                </div>
            </div>
        </div>

        <!-- Monthly Expense Card -->
        <div class="glass-card p-5 rounded-2xl relative overflow-hidden group hover:border-rose-500/40 transition">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-rose-500/10 rounded-full blur-xl group-hover:bg-rose-500/20 transition"></div>
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Expense (This Month)</span>
                <div class="w-8 h-8 rounded-xl bg-rose-500/10 text-rose-400 flex items-center justify-center">
                    <i data-lucide="arrow-up-right" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3">
                <div class="text-2xl md:text-3xl font-extrabold tracking-tight text-rose-300">
                    -₹{{ number_format($monthlyExpense, 2) }}
                </div>
                <div class="mt-1 text-xs text-slate-400">
                    Spent in {{ now()->format('M Y') }}
                </div>
            </div>
        </div>

        <!-- Net Savings / Surplus Card -->
        <div class="glass-card p-5 rounded-2xl relative overflow-hidden group hover:border-sky-500/40 transition">
            <div class="absolute -right-4 -bottom-4 w-24 h-24 bg-sky-500/10 rounded-full blur-xl group-hover:bg-sky-500/20 transition"></div>
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold uppercase tracking-wider text-slate-400">Net Savings</span>
                <div class="w-8 h-8 rounded-xl bg-sky-500/10 text-sky-400 flex items-center justify-center">
                    <i data-lucide="piggy-bank" class="w-4 h-4"></i>
                </div>
            </div>
            <div class="mt-3">
                <div class="text-2xl md:text-3xl font-extrabold tracking-tight {{ $netSavings >= 0 ? 'text-emerald-400' : 'text-rose-400' }}">
                    {{ $netSavings >= 0 ? '+' : '' }}₹{{ number_format($netSavings, 2) }}
                </div>
                <div class="mt-1 text-xs text-slate-400">
                    @if($monthlyIncome > 0)
                        <span>Savings Rate: <strong class="text-slate-200">{{ round(($netSavings / $monthlyIncome) * 100) }}%</strong></span>
                    @else
                        <span>No income logged</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Loan & Debt Sub-banner -->
    <div class="p-4 rounded-2xl bg-gradient-to-r from-slate-900 via-slate-800/80 to-slate-900 border border-slate-800 flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-500/20 text-indigo-400 flex items-center justify-center shrink-0">
                <i data-lucide="hand-coins" class="w-5 h-5"></i>
            </div>
            <div>
                <h4 class="text-sm font-bold text-slate-200">Pending Debt & Loan Balances</h4>
                <p class="text-xs text-slate-400">Track money lent to friends/clients and money borrowed</p>
            </div>
        </div>
        <div class="flex items-center gap-4 flex-wrap">
            <div class="px-3.5 py-1.5 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-xs">
                <span class="text-slate-400">Receivable (Lent):</span>
                <strong class="text-emerald-400 ml-1 font-bold">₹{{ number_format($pendingReceivable, 2) }}</strong>
            </div>
            <div class="px-3.5 py-1.5 rounded-xl bg-amber-500/10 border border-amber-500/20 text-xs">
                <span class="text-slate-400">Payable (Borrowed):</span>
                <strong class="text-amber-400 ml-1 font-bold">₹{{ number_format($pendingPayable, 2) }}</strong>
            </div>
            <a href="{{ route('debts.index') }}" class="text-xs font-semibold text-indigo-400 hover:text-indigo-300 flex items-center gap-1">
                View Details <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
            </a>
        </div>
    </div>

    <!-- Interactive Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Cashflow Bar Chart (2 Cols) -->
        <div class="lg:col-span-2 glass-panel p-5 rounded-2xl border border-slate-800 flex flex-col">
            <div class="flex items-center justify-between pb-4 border-b border-slate-800/70">
                <div>
                    <h3 class="font-bold text-base text-slate-100 flex items-center gap-2">
                        <i data-lucide="trending-up" class="w-4 h-4 text-emerald-400"></i>
                        Income vs Expense (Last 6 Months)
                    </h3>
                    <p class="text-xs text-slate-400">Monthly cash inflow and expenditure patterns</p>
                </div>
            </div>
            <div class="mt-4 flex-1 h-72">
                <canvas id="cashflowChart"></canvas>
            </div>
        </div>

        <!-- Expense Category Breakdown (1 Col) -->
        <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex flex-col">
            <div class="flex items-center justify-between pb-4 border-b border-slate-800/70">
                <div>
                    <h3 class="font-bold text-base text-slate-100 flex items-center gap-2">
                        <i data-lucide="pie-chart" class="w-4 h-4 text-rose-400"></i>
                        Monthly Expense Breakdown
                    </h3>
                    <p class="text-xs text-slate-400">{{ now()->format('F Y') }} categories</p>
                </div>
            </div>
            <div class="mt-4 flex-1 h-56 flex items-center justify-center">
                <canvas id="expenseCategoryChart"></canvas>
            </div>
            <div class="mt-3 pt-3 border-t border-slate-800/60 max-h-28 overflow-y-auto space-y-1 text-xs">
                @forelse($categoryExpenses->take(4) as $catExp)
                    <div class="flex items-center justify-between py-0.5">
                        <span class="flex items-center gap-1.5 text-slate-300 truncate">
                            <span class="w-2.5 h-2.5 rounded-full shrink-0" style="background-color: {{ $catExp['color'] }}"></span>
                            {{ $catExp['name'] }}
                        </span>
                        <span class="font-bold text-slate-200">₹{{ number_format($catExp['total'], 2) }}</span>
                    </div>
                @empty
                    <div class="text-center text-slate-500 py-2">No expenses logged this month</div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Active Accounts Overview -->
    <div class="glass-panel p-5 rounded-2xl border border-slate-800">
        <div class="flex items-center justify-between pb-4 border-b border-slate-800/70">
            <div>
                <h3 class="font-bold text-base text-slate-100 flex items-center gap-2">
                    <i data-lucide="landmark" class="w-4 h-4 text-sky-400"></i>
                    Connected Accounts & Balances
                </h3>
                <p class="text-xs text-slate-400">Live ledger balance per account</p>
            </div>
            <a href="{{ route('accounts.index') }}" class="text-xs font-semibold text-emerald-400 hover:text-emerald-300 flex items-center gap-1">
                Manage Accounts <i data-lucide="chevron-right" class="w-4 h-4"></i>
            </a>
        </div>

        <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($accounts as $acc)
                <div class="p-4 rounded-xl bg-slate-900/60 border border-slate-800 hover:border-slate-700 transition flex flex-col justify-between">
                    <div>
                        <div class="flex items-center justify-between mb-2">
                            <span class="px-2 py-0.5 text-[10px] font-bold rounded uppercase tracking-wider text-slate-300" style="background-color: {{ $acc->color }}20; border: 1px solid {{ $acc->color }}40;">
                                {{ $acc->type->label() }}
                            </span>
                            @if($acc->account_number)
                                <span class="text-[11px] font-mono text-slate-500">••{{ substr($acc->account_number, -4) }}</span>
                            @endif
                        </div>
                        <h4 class="font-semibold text-sm text-slate-100 truncate">{{ $acc->name }}</h4>
                    </div>
                    <div class="mt-3 pt-3 border-t border-slate-800/80 flex items-baseline justify-between">
                        <span class="text-xs text-slate-400">Balance:</span>
                        <span class="text-base font-extrabold text-white">₹{{ number_format($acc->current_balance, 2) }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bottom Section: Monthly Budgets & Recent Transactions -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Category Budgets Progress (1 Col) -->
        <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex flex-col">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800/70">
                <div>
                    <h3 class="font-bold text-base text-slate-100 flex items-center gap-2">
                        <i data-lucide="pie-chart" class="w-4 h-4 text-emerald-400"></i>
                        Monthly Budgets
                    </h3>
                    <p class="text-xs text-slate-400">{{ now()->format('M Y') }} limits</p>
                </div>
                <a href="{{ route('budgets.index') }}" class="text-xs font-semibold text-emerald-400 hover:text-emerald-300">
                    View All
                </a>
            </div>

            <div class="mt-4 space-y-4 flex-1">
                @forelse($budgets->take(5) as $b)
                    <div>
                        <div class="flex items-center justify-between text-xs mb-1">
                            <span class="font-semibold text-slate-200 truncate">{{ $b['category'] }}</span>
                            <span class="text-slate-400 font-mono">
                                ₹{{ number_format($b['spent']) }} / ₹{{ number_format($b['budget']) }}
                            </span>
                        </div>
                        <div class="w-full h-2 rounded-full bg-slate-800 overflow-hidden">
                            <div class="h-full rounded-full transition-all duration-500 {{ $b['is_exceeded'] ? 'bg-rose-500' : ($b['percent'] > 80 ? 'bg-amber-500' : 'bg-emerald-500') }}"
                                 style="width: {{ $b['percent'] }}%;">
                            </div>
                        </div>
                        <div class="flex items-center justify-between text-[10px] text-slate-400 mt-0.5">
                            <span>{{ $b['percent'] }}% used</span>
                            @if($b['is_exceeded'])
                                <span class="text-rose-400 font-bold">Exceeded!</span>
                            @else
                                <span>₹{{ number_format(max(0, $b['budget'] - $b['spent'])) }} left</span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="text-center py-8 text-slate-500 text-xs">
                        No budgets defined for this month.
                        <div class="mt-2">
                            <a href="{{ route('budgets.index') }}" class="text-emerald-400 underline font-semibold">Set Budgets Now</a>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Recent Transactions Table (2 Cols) -->
        <div class="lg:col-span-2 glass-panel p-5 rounded-2xl border border-slate-800 flex flex-col">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800/70">
                <div>
                    <h3 class="font-bold text-base text-slate-100 flex items-center gap-2">
                        <i data-lucide="receipt" class="w-4 h-4 text-emerald-400"></i>
                        Recent Transactions
                    </h3>
                    <p class="text-xs text-slate-400">Latest activity in your accounts</p>
                </div>
                <a href="{{ route('transactions.index') }}" class="text-xs font-semibold text-emerald-400 hover:text-emerald-300 flex items-center gap-1">
                    All Transactions <i data-lucide="chevron-right" class="w-4 h-4"></i>
                </a>
            </div>

            <div class="mt-4 flex-1 overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead>
                        <tr class="text-slate-400 border-b border-slate-800 font-semibold">
                            <th class="pb-2.5">Date</th>
                            <th class="pb-2.5">Description</th>
                            <th class="pb-2.5">Account</th>
                            <th class="pb-2.5">Category</th>
                            <th class="pb-2.5 text-right">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-800/60">
                        @forelse($recentTransactions as $txn)
                            <tr class="hover:bg-slate-900/40 transition">
                                <td class="py-2.5 text-slate-400 font-mono">
                                    {{ $txn->date->format('d M') }}
                                </td>
                                <td class="py-2.5 font-medium text-slate-100">
                                    <div class="truncate max-w-[200px]">{{ $txn->description }}</div>
                                    @if($txn->reference_number)
                                        <div class="text-[10px] text-slate-500 font-mono">{{ $txn->reference_number }}</div>
                                    @endif
                                </td>
                                <td class="py-2.5 text-slate-300">
                                    <span class="inline-flex items-center gap-1">
                                        {{ $txn->account->name }}
                                        @if($txn->toAccount)
                                            <i data-lucide="arrow-right" class="w-3 h-3 text-sky-400"></i>
                                            {{ $txn->toAccount->name }}
                                        @endif
                                    </span>
                                </td>
                                <td class="py-2.5">
                                    @if($txn->category)
                                        <span class="px-2 py-0.5 rounded text-[11px] font-semibold" style="background-color: {{ $txn->category->color }}20; color: {{ $txn->category->color }};">
                                            {{ $txn->category->name }}
                                        </span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-[11px] font-semibold bg-sky-500/20 text-sky-400">
                                            Transfer
                                        </span>
                                    @endif
                                </td>
                                <td class="py-2.5 text-right font-extrabold">
                                    @if($txn->type === \App\Enums\TransactionType::Income)
                                        <span class="text-emerald-400">+₹{{ number_format($txn->amount, 2) }}</span>
                                    @elseif($txn->type === \App\Enums\TransactionType::Expense)
                                        <span class="text-rose-400">-₹{{ number_format($txn->amount, 2) }}</span>
                                    @else
                                        <span class="text-sky-400">⇄ ₹{{ number_format($txn->amount, 2) }}</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-6 text-center text-slate-500">
                                    No transactions recorded yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Chart initialization script -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Cashflow Chart
        const cashflowCtx = document.getElementById('cashflowChart')?.getContext('2d');
        if (cashflowCtx) {
            const monthlyData = @json($monthlyTrends);
            new Chart(cashflowCtx, {
                type: 'bar',
                data: {
                    labels: monthlyData.map(d => d.label),
                    datasets: [
                        {
                            label: 'Income (₹)',
                            data: monthlyData.map(d => d.income),
                            backgroundColor: 'rgba(16, 185, 129, 0.8)',
                            borderColor: '#10b981',
                            borderRadius: 6,
                            borderWidth: 1,
                        },
                        {
                            label: 'Expense (₹)',
                            data: monthlyData.map(d => d.expense),
                            backgroundColor: 'rgba(244, 63, 94, 0.8)',
                            borderColor: '#f43f5e',
                            borderRadius: 6,
                            borderWidth: 1,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            labels: { color: '#94a3b8', font: { family: 'Plus Jakarta Sans', size: 11 } }
                        }
                    },
                    scales: {
                        x: {
                            grid: { color: 'rgba(255, 255, 255, 0.05)' },
                            ticks: { color: '#94a3b8', font: { family: 'Plus Jakarta Sans', size: 10 } }
                        },
                        y: {
                            grid: { color: 'rgba(255, 255, 255, 0.05)' },
                            ticks: { 
                                color: '#94a3b8', 
                                font: { family: 'Plus Jakarta Sans', size: 10 },
                                callback: value => '₹' + value.toLocaleString()
                            }
                        }
                    }
                }
            });
        }

        // Expense Category Doughnut Chart
        const expenseCatCtx = document.getElementById('expenseCategoryChart')?.getContext('2d');
        if (expenseCatCtx) {
            const catData = @json($categoryExpenses);
            if (catData.length > 0) {
                new Chart(expenseCatCtx, {
                    type: 'doughnut',
                    data: {
                        labels: catData.map(c => c.name),
                        datasets: [{
                            data: catData.map(c => c.total),
                            backgroundColor: catData.map(c => c.color || '#3b82f6'),
                            borderColor: '#0f172a',
                            borderWidth: 2,
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        cutout: '68%'
                    }
                });
            } else {
                expenseCatCtx.font = "12px Plus Jakarta Sans";
                expenseCatCtx.fillStyle = "#64748b";
                expenseCatCtx.textAlign = "center";
                expenseCatCtx.fillText("No Expense Data", 100, 100);
            }
        }
    });
</script>
@endsection
