<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EngineTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:engine_types',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Engine name field is required.',
            'name.string' => 'The Engine name field must be a string.',
            'name.max' => 'The Engine name field must not exceed 255 characters.',
            'name.unique' => 'The Engine Type is already added.',
        ];
    }
}
