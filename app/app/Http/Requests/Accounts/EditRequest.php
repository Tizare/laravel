<?php

declare(strict_types=1);

namespace App\Http\Requests\Accounts;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:50'],
            'is_admin' => ['required', 'boolean']
        ];
    }
}
