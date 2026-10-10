<?php

namespace App\Http\Requests;

use App\Enums\TransactionType;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'account_id' => ['required', 'exists:accounts,id'],
            'type' => ['required', Rule::enum(TransactionType::class)],
            'category_id' => [
                Rule::requiredIf(fn () => in_array($this->input('type'), [TransactionType::Income->value, TransactionType::Expense->value])),
                'nullable',
                'exists:categories,id',
            ],
            'to_account_id' => [
                Rule::requiredIf(fn () => $this->input('type') === TransactionType::Transfer->value),
                'nullable',
                'different:account_id',
                'exists:accounts,id',
            ],
            'amount' => ['required', 'numeric', 'min:0.01'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string', 'max:255'],
            'reference_number' => ['nullable', 'string', 'max:100'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
