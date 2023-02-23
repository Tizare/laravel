<?php

declare(strict_types=1);

namespace App\Http\Requests\Questions;

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
            'phone' => ['required', 'numeric', 'min:6'],
            'email' => ['required', 'email'],
            'text' => ['required', 'string', 'min:10', 'max:500'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'text' => 'Запрос',
            'name' => 'Имя заказчика'
        ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return [
            'required' => 'Милый друг, ты забыл заполнить поле :attribute  =('
        ];
    }
}
