<!DOCTYPE html>
<html lang="en" class="h-full bg-slate-950 text-slate-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Finance Manager') - Smart Financial Management</title>
    <meta name="description" content="Personal & Business Finance Management System">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons (Lucide) -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Chart.js for data visualization -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .glass-panel {
            background: rgba(15, 23, 42, 0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
        }
        .glass-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.6) 0%, rgba(15, 23, 42, 0.8) 100%);
            border: 1px solid rgba(255, 255, 255, 0.06);
        }
        .glow-emerald {
            box-shadow: 0 0 25px -5px rgba(16, 185, 129, 0.2);
        }
        .glow-indigo {
            box-shadow: 0 0 25px -5px rgba(99, 102, 241, 0.25);
        }
    </style>
</head>
<body class="h-full flex flex-col md:flex-row overflow-x-hidden antialiased bg-slate-950 text-slate-100 selection:bg-emerald-500 selection:text-white">

    <!-- Mobile Top Navigation Bar -->
    <header class="md:hidden glass-panel sticky top-0 z-40 flex items-center justify-between px-4 py-3 border-b border-slate-800">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5">
            <div class="h-9 w-9 rounded-xl bg-gradient-to-tr from-emerald-500 to-teal-400 flex items-center justify-center text-slate-950 shadow-md">
                <i data-lucide="wallet" class="w-5 h-5"></i>
            </div>
            <div>
                <span class="font-bold text-lg tracking-tight bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 bg-clip-text text-transparent">FinancePro</span>
            </div>
        </a>
        <button id="mobileMenuBtn" type="button" class="p-2 text-slate-400 hover:text-white rounded-lg hover:bg-slate-800">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
    </header>

    <!-- Sidebar Navigation -->
    <aside id="sidebarNav" class="fixed md:sticky top-0 inset-y-0 left-0 z-50 w-64 glass-panel border-r border-slate-800/80 flex flex-col transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out h-screen">
        <!-- Logo Branding -->
        <div class="p-5 border-b border-slate-800/80 flex items-center justify-between">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-xl bg-gradient-to-tr from-emerald-500 via-teal-400 to-cyan-400 flex items-center justify-center text-slate-950 font-black shadow-lg shadow-emerald-500/20">
                    <i data-lucide="wallet" class="w-5 h-5"></i>
                </div>
                <div>
                    <h1 class="font-extrabold text-xl tracking-tight bg-gradient-to-r from-emerald-400 via-teal-300 to-cyan-400 bg-clip-text text-transparent">FinancePro</h1>
                    <p class="text-xs text-slate-400 font-medium">Smart Money Ledger</p>
                </div>
            </a>
            <button id="closeSidebarBtn" class="md:hidden text-slate-400 hover:text-white">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 p-3.5 space-y-1.5 overflow-y-auto">
            <a href="{{ route('dashboard') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('dashboard') ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i data-lucide="layout-dashboard" class="w-4 h-4"></i>
                <span>Dashboard</span>
            </a>

            <a href="{{ route('transactions.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('transactions.*') ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i data-lucide="arrow-left-right" class="w-4 h-4"></i>
                <span>Transactions</span>
            </a>

            <a href="{{ route('accounts.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('accounts.*') ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i data-lucide="landmark" class="w-4 h-4"></i>
                <span>Accounts & Banks</span>
            </a>

            <a href="{{ route('budgets.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('budgets.*') ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i data-lucide="pie-chart" class="w-4 h-4"></i>
                <span>Monthly Budgets</span>
            </a>

            <a href="{{ route('debts.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('debts.*') ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i data-lucide="hand-coins" class="w-4 h-4"></i>
                <span>Debts & Loans</span>
            </a>

            <a href="{{ route('categories.index') }}" 
               class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-sm font-semibold transition-all {{ request()->routeIs('categories.*') ? 'bg-emerald-500/15 text-emerald-400 border border-emerald-500/30' : 'text-slate-400 hover:text-slate-200 hover:bg-slate-800/60' }}">
                <i data-lucide="tags" class="w-4 h-4"></i>
                <span>Categories</span>
            </a>
        </nav>

        <!-- Sidebar Quick Add Trigger -->
        <div class="p-4 border-t border-slate-800/80 bg-slate-900/40">
            <button onclick="openTransactionModal()" 
                    type="button" 
                    class="w-full py-2.5 px-4 rounded-xl font-semibold text-sm bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-slate-950 flex items-center justify-center gap-2 shadow-lg shadow-emerald-500/20 active:scale-95 transition-all">
                <i data-lucide="plus-circle" class="w-4 h-4 stroke-[2.5]"></i>
                <span>Quick Transaction</span>
            </button>
            <div class="mt-3 text-center">
                <span class="text-[11px] text-slate-400 font-mono">Currency: INR (₹)</span>
            </div>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 flex flex-col min-w-0 min-h-screen">
        <!-- Top App Bar -->
        <header class="glass-panel sticky top-0 z-30 hidden md:flex items-center justify-between px-8 py-3.5 border-b border-slate-800/70">
            <div class="flex items-center gap-4">
                <h2 class="font-bold text-lg text-slate-100">@yield('page-title', 'Overview')</h2>
                <div class="h-4 w-px bg-slate-800"></div>
                <span class="text-xs font-medium text-slate-400 flex items-center gap-1.5">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 text-emerald-400"></i>
                    {{ now()->format('l, d F Y') }}
                </span>
            </div>
            <div class="flex items-center gap-3">
                <button onclick="openTransactionModal('income')" 
                        class="px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20 hover:bg-emerald-500/20 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-down-left" class="w-3.5 h-3.5"></i>
                    Add Income
                </button>
                <button onclick="openTransactionModal('expense')" 
                        class="px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20 hover:bg-rose-500/20 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-up-right" class="w-3.5 h-3.5"></i>
                    Add Expense
                </button>
                <button onclick="openTransferModal()" 
                        class="px-3.5 py-1.5 rounded-lg text-xs font-semibold bg-sky-500/10 text-sky-400 border border-sky-500/20 hover:bg-sky-500/20 transition flex items-center gap-1.5">
                    <i data-lucide="arrow-right-left" class="w-3.5 h-3.5"></i>
                    Transfer
                </button>
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="px-4 md:px-8 pt-4">
            @if(session('success'))
                <div class="mb-4 p-4 rounded-xl bg-emerald-500/10 border border-emerald-500/30 text-emerald-300 flex items-center justify-between text-sm shadow-sm animate-fade-in">
                    <div class="flex items-center gap-3">
                        <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-400"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-emerald-400 hover:text-emerald-200">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 rounded-xl bg-rose-500/10 border border-rose-500/30 text-rose-300 flex items-center justify-between text-sm shadow-sm">
                    <div class="flex items-center gap-3">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-rose-400"></i>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button type="button" onclick="this.parentElement.remove()" class="text-rose-400 hover:text-rose-200">
                        <i data-lucide="x" class="w-4 h-4"></i>
                    </button>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 p-4 rounded-xl bg-amber-500/10 border border-amber-500/30 text-amber-300 text-sm">
                    <div class="flex items-center gap-2 font-semibold mb-1">
                        <i data-lucide="alert-triangle" class="w-4 h-4 text-amber-400"></i>
                        <span>Please correct the errors:</span>
                    </div>
                    <ul class="list-disc list-inside text-xs space-y-0.5 ml-2 text-amber-400">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <!-- Page Body -->
        <div class="flex-1 p-4 md:p-8">
            @yield('content')
        </div>
    </main>

    <!-- Global Quick Transaction Modal -->
    <div id="quickTransactionModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
        <div class="glass-panel w-full max-w-lg rounded-2xl p-6 shadow-2xl border border-slate-700/60 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                        <i data-lucide="plus" class="w-4 h-4"></i>
                    </div>
                    <h3 id="modalTitle" class="font-bold text-lg text-slate-100">Add Transaction</h3>
                </div>
                <button onclick="closeTransactionModal()" class="text-slate-400 hover:text-white p-1 rounded-lg">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <form action="{{ route('transactions.store') }}" method="POST" class="mt-4 space-y-4">
                @csrf
                
                <!-- Type Selector -->
                <div>
                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Transaction Type</label>
                    <div class="grid grid-cols-3 gap-2">
                        <label class="cursor-pointer">
                            <input type="radio" name="type" value="income" class="peer sr-only" onchange="handleTypeChange('income')">
                            <div class="p-2.5 text-center text-xs font-semibold rounded-xl border border-slate-700/60 peer-checked:bg-emerald-500/20 peer-checked:border-emerald-500 peer-checked:text-emerald-400 hover:bg-slate-800 transition">
                                Income (+)
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="type" value="expense" checked class="peer sr-only" onchange="handleTypeChange('expense')">
                            <div class="p-2.5 text-center text-xs font-semibold rounded-xl border border-slate-700/60 peer-checked:bg-rose-500/20 peer-checked:border-rose-500 peer-checked:text-rose-400 hover:bg-slate-800 transition">
                                Expense (-)
                            </div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="type" value="transfer" class="peer sr-only" onchange="handleTypeChange('transfer')">
                            <div class="p-2.5 text-center text-xs font-semibold rounded-xl border border-slate-700/60 peer-checked:bg-sky-500/20 peer-checked:border-sky-500 peer-checked:text-sky-400 hover:bg-slate-800 transition">
                                Transfer (⇄)
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Amount & Date -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1.5">Amount (₹) *</label>
                        <div class="relative">
                            <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 font-bold">₹</span>
                            <input type="number" step="0.01" name="amount" required placeholder="0.00" class="w-full pl-8 pr-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 text-slate-100 placeholder-slate-500 text-sm font-semibold">
                        </div>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1.5">Date *</label>
                        <input type="date" name="date" value="{{ now()->format('Y-m-d') }}" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 text-slate-100 text-sm">
                    </div>
                </div>

                <!-- From Account -->
                <div>
                    <label id="accountLabel" class="block text-xs font-semibold text-slate-300 mb-1.5">Account *</label>
                    <select name="account_id" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                        @foreach(\App\Models\Account::where('is_active', true)->orderBy('name')->get() as $acc)
                            <option value="{{ $acc->id }}">{{ $acc->name }} (₹{{ number_format($acc->current_balance, 2) }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Destination Account (For Transfer) -->
                <div id="toAccountField" class="hidden">
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Transfer To Account *</label>
                    <select name="to_account_id" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-sky-500 text-slate-100 text-sm">
                        @foreach(\App\Models\Account::where('is_active', true)->orderBy('name')->get() as $acc)
                            <option value="{{ $acc->id }}">{{ $acc->name }} (₹{{ number_format($acc->current_balance, 2) }})</option>
                        @endforeach
                    </select>
                </div>

                <!-- Category (For Income/Expense) -->
                <div id="categoryField">
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Category</label>
                    <select name="category_id" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                        <option value="">-- Select Category --</option>
                        <optgroup label="Expense Categories">
                            @foreach(\App\Models\Category::where('type', 'expense')->orderBy('name')->get() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </optgroup>
                        <optgroup label="Income Categories">
                            @foreach(\App\Models\Category::where('type', 'income')->orderBy('name')->get() as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Description / Note *</label>
                    <input type="text" name="description" required placeholder="e.g. Grocery purchase, Salary, Freelance project" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 placeholder-slate-500 text-sm">
                </div>

                <!-- Reference / Bill Number -->
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Reference / Txn ID (Optional)</label>
                    <input type="text" name="reference_number" placeholder="e.g. UPI-129384, INV-0042" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 placeholder-slate-500 text-sm">
                </div>

                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeTransactionModal()" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-gradient-to-r from-emerald-500 to-teal-500 hover:from-emerald-400 hover:to-teal-400 text-slate-950 shadow-md shadow-emerald-500/20 transition">
                        Save Transaction
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Quick Transfer Modal -->
    <div id="quickTransferModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
        <div class="glass-panel w-full max-w-md rounded-2xl p-6 shadow-2xl border border-slate-700/60">
            <div class="flex items-center justify-between pb-4 border-b border-slate-800">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-sky-500/20 text-sky-400 flex items-center justify-center">
                        <i data-lucide="arrow-right-left" class="w-4 h-4"></i>
                    </div>
                    <h3 class="font-bold text-lg text-slate-100">Transfer Funds</h3>
                </div>
                <button onclick="closeTransferModal()" class="text-slate-400 hover:text-white p-1 rounded-lg">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>

            <form action="{{ route('accounts.transfer') }}" method="POST" class="mt-4 space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">From Account *</label>
                    <select name="from_account_id" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-sky-500 text-slate-100 text-sm">
                        @foreach(\App\Models\Account::where('is_active', true)->orderBy('name')->get() as $acc)
                            <option value="{{ $acc->id }}">{{ $acc->name }} (₹{{ number_format($acc->current_balance, 2) }})</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">To Destination Account *</label>
                    <select name="to_account_id" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-sky-500 text-slate-100 text-sm">
                        @foreach(\App\Models\Account::where('is_active', true)->orderBy('name')->get() as $acc)
                            <option value="{{ $acc->id }}">{{ $acc->name }} (₹{{ number_format($acc->current_balance, 2) }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1.5">Amount (₹) *</label>
                        <input type="number" step="0.01" name="amount" required placeholder="0.00" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-sky-500 text-slate-100 text-sm font-semibold">
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-300 mb-1.5">Date *</label>
                        <input type="date" name="date" value="{{ now()->format('Y-m-d') }}" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-sky-500 text-slate-100 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Transfer Reason / Note *</label>
                    <input type="text" name="description" required placeholder="e.g. ATM withdrawal, savings transfer" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-sky-500 text-slate-100 text-sm">
                </div>

                <div class="pt-2 flex items-center justify-end gap-3">
                    <button type="button" onclick="closeTransferModal()" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                        Cancel
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-gradient-to-r from-sky-500 to-blue-500 hover:from-sky-400 hover:to-blue-400 text-white shadow-md shadow-sky-500/20 transition">
                        Confirm Transfer
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Script for Modals & Mobile Sidebar -->
    <script>
        lucide.createIcons();

        // Mobile Sidebar toggling
        const sidebarNav = document.getElementById('sidebarNav');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const closeSidebarBtn = document.getElementById('closeSidebarBtn');

        if (mobileMenuBtn) {
            mobileMenuBtn.addEventListener('click', () => {
                sidebarNav.classList.remove('-translate-x-full');
            });
        }
        if (closeSidebarBtn) {
            closeSidebarBtn.addEventListener('click', () => {
                sidebarNav.classList.add('-translate-x-full');
            });
        }

        // Global Transaction Modal Functions
        function openTransactionModal(type = 'expense') {
            const modal = document.getElementById('quickTransactionModal');
            modal.classList.remove('hidden');
            const radio = modal.querySelector(`input[name="type"][value="${type}"]`);
            if (radio) {
                radio.checked = true;
                handleTypeChange(type);
            }
        }

        function closeTransactionModal() {
            document.getElementById('quickTransactionModal').classList.add('hidden');
        }

        function handleTypeChange(type) {
            const categoryField = document.getElementById('categoryField');
            const toAccountField = document.getElementById('toAccountField');
            const accountLabel = document.getElementById('accountLabel');
            const modalTitle = document.getElementById('modalTitle');

            if (type === 'transfer') {
                categoryField.classList.add('hidden');
                toAccountField.classList.remove('hidden');
                accountLabel.innerText = 'From Account *';
                modalTitle.innerText = 'Transfer Funds Between Accounts';
            } else {
                categoryField.classList.remove('hidden');
                toAccountField.classList.add('hidden');
                accountLabel.innerText = 'Account *';
                modalTitle.innerText = type === 'income' ? 'Record Income (+)' : 'Record Expense (-)';
            }
        }

        // Transfer modal functions
        function openTransferModal() {
            document.getElementById('quickTransferModal').classList.remove('hidden');
        }

        function closeTransferModal() {
            document.getElementById('quickTransferModal').classList.add('hidden');
        }
    </script>
</body>
</html>
