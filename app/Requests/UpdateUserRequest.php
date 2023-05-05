<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
    public function rules(Request $requset)
    {
        return [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'address' => 'nullable',
            'role_id' => 'required',
            'phone' => 'required|max:11|unique:users,phone,' . $this->user->id,
            'password' => 'nullable|sometimes|min:8|confirmed',
        ];
    }
}
