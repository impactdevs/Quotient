<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust authorization as needed
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'expense_type' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date|before_or_equal:today',
            'description' => 'required|string|max:500',
            'category' => 'required|array',
            'receipt_path' => 'nullable|file|mimes:jpg,png,pdf|max:2048',  // max 2MB for the file
        ];
    }

    /**
     * Get custom error messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'expense_type.required' => 'The expense category is required.',
            'amount.required' => 'The amount is required.',
            'date.before_or_equal' => 'The date must be be or equal to the today.',
            'description.required' => 'The expense description is required.',
            'receipt_path.file' => 'The receipt should be a valid file.',
            'category.json' => 'The category must be a valid JSON string.',
        ];
    }
}
