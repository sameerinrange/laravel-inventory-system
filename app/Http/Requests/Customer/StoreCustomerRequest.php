<?php

namespace App\Http\Requests\Customer;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:customers,email',
            'phone' => 'required|string|max:25|unique:customers,phone',
            'account_holder' => 'max:50',
            'account_number' => 'max:25',
            'bank_name' => 'max:25',
            'address' => 'required|string|max:100',
            'tax_number' => 'nullable|string|min:4|max:50|regex:/^[a-zA-Z0-9]+$/',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:255',        
            'country' => 'nullable|string|max:255',

        ];
    }
}
