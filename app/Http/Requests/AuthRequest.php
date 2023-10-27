<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        return [
            'email' => ['unique:users,email','email','required'],
            'password' => ['min:6', 'required','confirmed']
        ];
    }

    public function  messages() {
        return [
            'email' => ['unique' => 'Пользователь с такой почтой уже существует', 'email'=> 'Некорректно указана почта', 'required' => 'Не указана почта'],
            'password' => ['min' => 'Длина пароля меньше 6 символов', 'confirmed' => 'Пароли не совадают', 'required' => 'Не введён пароль']
        ];
    }
}
