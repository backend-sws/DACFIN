<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:120'],
            'phone' => ['required', 'regex:/^[0-9+\-\s]{8,15}$/'],
            'email' => ['required', 'email', 'max:150'],
            'interest' => ['nullable', 'in:Financial Planning,Investment Advise,Wealth Management,Insurance,Loan,Training'],
            'message' => ['nullable', 'string', 'max:2000'],
            'website' => ['prohibited'], // Honeypot — bots fill it
        ];
    }
}
