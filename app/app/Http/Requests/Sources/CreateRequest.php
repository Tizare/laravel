<?php

declare(strict_types=1);

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2', 'max:50'],
            'url' => ['required', 'string', 'min:6'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'title' => 'Название сайта',
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
