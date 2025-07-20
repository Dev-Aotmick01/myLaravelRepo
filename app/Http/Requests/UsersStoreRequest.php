<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UsersStoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[\pL\s\-]+$/u|min:5|max:50',
            'email' => 'required|unique:users|email:rfc,dns',
            'password' => ['required', 'confirmed', Password::defaults()],
            "password_confirmation" => 'required',
            "created_at" => 'nullable',
//            "created_at" => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    public function messages()
    {
        return [
//                'name.required' => 'The name field is required.',
//                'name.regex' => 'The name may only contain letters, spaces, and hyphens.',
//                'email.required' => 'The email field is required.',
//                'email.unique' => 'The email has already been taken.',
//                'password.required' => 'The password field is required.',
//                'password.confirmed' => 'The password confirmation does not match.',
//                'password_confirmation.required' => 'The password confirmation field is required.',
            'created_at' => 'This created at date field can not be blanked.',
        ];
    }

}
