<?php

declare(strict_types=1);

namespace App\Http\Requests\Web\Backend\Posts;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'category' => [
                'required',
                'int',
                'exists:categories,id',
            ],
            'description' => [
                'required',
                'string',
                'min:2',
                'max:120',
            ],
            'content' => [
                'required',
                'string'
            ]
        ];
    }
}
