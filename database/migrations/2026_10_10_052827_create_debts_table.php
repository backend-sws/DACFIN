<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('debts', function (Blueprint $table): void {
            $table->id();
            $table->string('person_name');
            $table->string('phone', 20)->nullable();
            $table->string('type'); // lent, borrowed
            $table->decimal('amount', 15, 2);
            $table->decimal('paid_amount', 15, 2)->default(0.00);
            $table->date('due_date')->nullable();
            $table->string('status')->default('pending'); // pending, partial, settled
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
