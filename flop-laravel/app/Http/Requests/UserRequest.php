<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;


class UserRequest extends FormRequest
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
            "lastName" => "min:3|max:20|alpha_dash",
            "firstName" => "min:3|max:20|alpha_dash",
            "nickname" => "min:3|max:20|alpha_dash|unique:users,nickname",
            "address" => "string|max:255",
            "email" => "email|required|unique:users,email",
            "phone" => "string|max:20",
            "password" => "required",
        ];
    }
}
