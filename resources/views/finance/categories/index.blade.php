@extends('layouts.app')

@section('title', 'Categories')
@section('page-title', 'Income & Expense Categories')

@section('content')
<div class="space-y-6">

    <!-- Header & Action Bar -->
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h2 class="text-xl font-extrabold text-white">Categories Management</h2>
            <p class="text-xs text-slate-400">Organize your financial transactions by custom income and expense categories</p>
        </div>
        <button onclick="openAddCategoryModal()" class="px-4 py-2 rounded-xl text-xs font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition flex items-center gap-1.5 shadow-md shadow-emerald-500/20">
            <i data-lucide="plus-circle" class="w-4 h-4 stroke-[2.5]"></i> Add New Category
        </button>
    </div>

    <!-- Category Grids: Expense & Income -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        <!-- Expense Categories -->
        <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex flex-col">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800/80">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                    <h3 class="font-bold text-sm text-slate-100">Expense Categories ({{ $expenseCategories->count() }})</h3>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3 flex-1">
                @foreach($expenseCategories as $cat)
                    <div class="p-3 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-center justify-between hover:border-slate-700 transition">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <span class="w-3.5 h-3.5 rounded-full shrink-0" style="background-color: {{ $cat->color }}"></span>
                            <div class="truncate">
                                <h4 class="font-semibold text-xs text-slate-200 truncate">{{ $cat->name }}</h4>
                                <span class="text-[10px] text-slate-500 font-mono">{{ $cat->transactions_count }} txns</span>
                            </div>
                        </div>
                        @if(!$cat->is_system && $cat->transactions_count == 0)
                            <form action="{{ route('categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('Delete this category?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-slate-500 hover:text-rose-400" title="Delete">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Income Categories -->
        <div class="glass-panel p-5 rounded-2xl border border-slate-800 flex flex-col">
            <div class="flex items-center justify-between pb-3 border-b border-slate-800/80">
                <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                    <h3 class="font-bold text-sm text-slate-100">Income Categories ({{ $incomeCategories->count() }})</h3>
                </div>
            </div>

            <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3 flex-1">
                @foreach($incomeCategories as $cat)
                    <div class="p-3 rounded-xl bg-slate-900/60 border border-slate-800/80 flex items-center justify-between hover:border-slate-700 transition">
                        <div class="flex items-center gap-2.5 min-w-0">
                            <span class="w-3.5 h-3.5 rounded-full shrink-0" style="background-color: {{ $cat->color }}"></span>
                            <div class="truncate">
                                <h4 class="font-semibold text-xs text-slate-200 truncate">{{ $cat->name }}</h4>
                                <span class="text-[10px] text-slate-500 font-mono">{{ $cat->transactions_count }} txns</span>
                            </div>
                        </div>
                        @if(!$cat->is_system && $cat->transactions_count == 0)
                            <form action="{{ route('categories.destroy', $cat) }}" method="POST" onsubmit="return confirm('Delete this category?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1 text-slate-500 hover:text-rose-400" title="Delete">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Modal: Add New Category -->
<div id="addCategoryModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-slate-950/80 backdrop-blur-sm">
    <div class="glass-panel w-full max-w-md rounded-2xl p-6 shadow-2xl border border-slate-700/60">
        <div class="flex items-center justify-between pb-4 border-b border-slate-800">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center">
                    <i data-lucide="tags" class="w-4 h-4"></i>
                </div>
                <h3 class="font-bold text-lg text-slate-100">Add New Category</h3>
            </div>
            <button onclick="closeAddCategoryModal()" class="text-slate-400 hover:text-white p-1 rounded-lg">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
        </div>

        <form action="{{ route('categories.store') }}" method="POST" class="mt-4 space-y-4">
            @csrf
            
            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Category Name *</label>
                <input type="text" name="name" required placeholder="e.g. Subscriptions, Consulting, Gym" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-300 mb-1.5">Category Type *</label>
                <select name="type" required class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                    @foreach($categoryTypes as $t)
                        <option value="{{ $t->value }}">{{ $t->label() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-2 gap-3">
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Badge Color</label>
                    <input type="color" name="color" value="#10b981" class="w-full h-10 rounded-xl bg-slate-900 border border-slate-700 cursor-pointer">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-300 mb-1.5">Icon Name</label>
                    <input type="text" name="icon" value="tag" placeholder="tag, home, star" class="w-full px-3.5 py-2.5 rounded-xl bg-slate-900 border border-slate-700 focus:border-emerald-500 text-slate-100 text-sm">
                </div>
            </div>

            <div class="pt-2 flex items-center justify-end gap-3">
                <button type="button" onclick="closeAddCategoryModal()" class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-400 hover:text-white hover:bg-slate-800 transition">
                    Cancel
                </button>
                <button type="submit" class="px-5 py-2.5 rounded-xl text-sm font-bold bg-emerald-500 hover:bg-emerald-400 text-slate-950 transition">
                    Create Category
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddCategoryModal() {
        document.getElementById('addCategoryModal').classList.remove('hidden');
    }
    function closeAddCategoryModal() {
        document.getElementById('addCategoryModal').classList.add('hidden');
    }
</script>
@endsection
