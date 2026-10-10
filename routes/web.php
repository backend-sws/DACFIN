<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Accounts
Route::post('/accounts/transfer', [AccountController::class, 'transfer'])->name('accounts.transfer');
Route::resource('accounts', AccountController::class)->except(['create', 'show', 'edit']);

// Transactions
Route::resource('transactions', TransactionController::class)->except(['create', 'show', 'edit']);

// Categories
Route::resource('categories', CategoryController::class)->except(['create', 'show', 'edit']);

// Budgets
Route::resource('budgets', BudgetController::class)->only(['index', 'store', 'destroy']);

// Debts & Loans
Route::post('/debts/{debt}/payment', [DebtController::class, 'recordPayment'])->name('debts.payment');
Route::resource('debts', DebtController::class)->except(['create', 'show', 'edit']);
