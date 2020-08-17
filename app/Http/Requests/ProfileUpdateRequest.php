<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            //'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name обязательный параметр',
            'name.string' => 'Name должен быть строкой',
            'name.min' => 'Name должен быть не менее 2 символов',
            'name.max' => 'Name должен быть не более 255 символов',
            /*'email.required' => 'Email обязательный параметр',
            'email.string' => 'Email должен быть строкой',
            'email.email' => 'Не правильный формат почтового ящика',
            'email.max' => 'Email должен быть не более 255 символов',
            'email.unique' => 'Пользователь с таким параметром существует',*/
            'password.required' => 'Password обязательный параметр',
            'password.string' => 'Password должен быть строкой',
            'password.min' => 'Password должен быть не менее 8 символов',
            'password.confirmed' => 'Пароли должны совпадать',
        ];
    }
}
