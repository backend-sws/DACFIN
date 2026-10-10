<?php

namespace App\Http\Controllers;

use App\Enums\CategoryType;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(): View
    {
        $categories = Category::withCount('transactions')->orderBy('name')->get();
        $incomeCategories = $categories->where('type', CategoryType::Income);
        $expenseCategories = $categories->where('type', CategoryType::Expense);
        $categoryTypes = CategoryType::cases();

        return view('finance.categories.index', compact('incomeCategories', 'expenseCategories', 'categoryTypes'));
    }

    /**
     * Store a newly created category.
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        Category::create($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    /**
     * Update the specified category.
     */
    public function update(StoreCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->validated());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified category.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if ($category->is_system) {
            return redirect()->route('categories.index')->with('error', 'Default system categories cannot be deleted.');
        }

        if ($category->transactions()->exists()) {
            return redirect()->route('categories.index')->with('error', 'Cannot delete category that is attached to transactions.');
        }

        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
