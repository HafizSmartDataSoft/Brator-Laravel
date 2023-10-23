<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleMakeRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:vehicle_makes',
            "link" => 'required|string|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The Vehicle Make name field is required.',
            'name.string' => 'The Vehicle Make name field must be a string.',
            'name.max' => 'The Vehicle Make name field must not exceed 255 characters.',
            'name.unique' => 'The Vehicle Make  is already added.',
            'link.required' => 'The Website Link field is required.',

        ];
    }
}
