<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeroRequest extends FormRequest
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
            'type' => ['required', 'string'],
            'content' => ['nullable', 'required_unless:type,Gambar', 'string'],
            'image' => ['nullable', 'required_if:type,Gambar', 'image', 'max:4096'],
        ];
    }
}
