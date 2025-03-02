<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'photo' => 'image|file|max:1024',
            'name' => 'required|max:50',
            'shop_name' => 'required|max:200',
            'email' => 'required|email|max:50|unique:users,email',
            'username' => 'required|min:4|max:25|alpha_dash:ascii|unique:users,username',
            'password' => 'required_with:password_confirmation|min:6',
            'password_confirmation' => 'same:password|min:6',
            'currency_code' => 'nullable|string|exists:currencies,currency_code|max:10',
            'currency_symbol' => 'nullable|string|max:10',
            'currency' => 'nullable|string|max:50',  
            'tax_number' => 'nullable|string|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'alternate_phone' => 'nullable|string|max:255',
        ];
    }
}
