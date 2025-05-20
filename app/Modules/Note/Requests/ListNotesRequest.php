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
            'to.after_or_equal' => 'La fecha final debe ser posterior o igual a la fecha inicial',
            'q.min' => 'El término de búsqueda debe tener al menos 2 caracteres',
            'sort.in' => 'El ordenamiento seleccionado no es válido',
        ];
    }
} 