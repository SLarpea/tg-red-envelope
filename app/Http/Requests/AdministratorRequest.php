<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdministratorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = [];

        if ($this->update_type !== 'all') {
            $rules['status'] = 'required|integer';
        } else {
            $rules = [
                'name' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
                'password_confirmation' => 'required|string|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/',
                'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->id),],
                'status' => 'required|integer',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'The password confirmation does not match.',
            'password.regex' => 'The password must contain at least 1 uppercase letter, 1 numeric digit, and 1 symbol.',
        ];
    }
}
