<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'address' => 'nullable',
            'role_id' => 'required',
            'phone' => 'required|max:11|unique:users,phone',
            'password' => 'required|string|min:4|confirmed',
        ];
    }
}
