<?php

namespace App\Modules\Note\Requests;

use App\Modules\Note\Models\Note;
use Illuminate\Foundation\Http\FormRequest;

class ListNotesRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['nullable', 'string'],
            'from' => ['nullable', 'date'],
            'to' => ['nullable', 'date', 'after_or_equal:from'],
            'q' => ['nullable', 'string', 'min:2'],
            'sort' => ['nullable', 'string', 'in:' . implode(',', Note::AVAILABLE_SORTS)],
        ];
    }

    public function messages(): array
    {
        return [
            'to.after_or_equal' => 'The end date must be after or equal to the start date',
            'q.min' => 'The search term must be at least 2 characters long',
            'sort.in' => 'The selected sorting option is not valid',
        ];
    }
} 