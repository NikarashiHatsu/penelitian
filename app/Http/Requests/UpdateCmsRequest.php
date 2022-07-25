<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCmsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'feature' => ['required', 'string'],
            'writer' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'file.*' => ['nullable', 'file', 'max:16384'],    // 16MB
        ];
    }
}
