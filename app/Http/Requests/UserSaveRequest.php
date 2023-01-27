<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSaveRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|unique:users,email|email|max:255',
            'password' => 'required|confirmed|string|min:6|max:255',
        ];
    }
}
