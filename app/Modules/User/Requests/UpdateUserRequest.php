<?php

namespace App\Modules\User\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // La policy se aplica en el controlador
    }

    public function rules(): array
    {
        return [
            'name'    => ['string', 'max:255'],
            'phone'   => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],

            // Settings validation
            'settings' => ['nullable', 'array'],
            'settings.theme' => ['nullable', 'in:light,dark'],
            'settings.language' => ['nullable', 'in:es,en'],
            'settings.notifications' => ['nullable', 'boolean'],
        ];
    }
}
