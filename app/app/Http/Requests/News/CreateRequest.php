<?php

declare(strict_types=1);

namespace App\Http\Requests\News;

use App\Enums\NewsStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

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
            'title' => ['required', 'string', 'min:5', 'max:250'],
            'description' => ['required', 'string', 'min:20', 'max:300'],
            'text' => ['required', 'string', 'min:50', 'max:5000'],
            'author' => ['required', 'string', 'min:2', 'max:50'],
            'status' => ['required', new Enum(NewsStatus::class)],
            'category_id' => ['required', 'exists:categories,id'],
        ];
    }

    /**
     * @return string[]
     */
    public function attributes(): array
    {
        return [
            'text' => 'Новость',
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
