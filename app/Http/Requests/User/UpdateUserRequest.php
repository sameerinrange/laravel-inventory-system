<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'photo' => 'image|file|max:1024',
            'email' => [
                'required',
                'email',
                'max:50',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'tax_number' => 'nullable|string|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'alternate_phone' => 'nullable|string|max:255',
           /*  'username' => [
                'required',
                'min:4',
                'max:25',
                'alpha_dash:ascii',
                Rule::unique('users', 'username')->ignore($this->user)
            ], */
        ];
    }
}
