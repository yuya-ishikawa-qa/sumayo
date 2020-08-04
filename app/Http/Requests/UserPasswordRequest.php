<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserPasswordRequest extends FormRequest
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
     * @return array
     */
    public function rules() {

        return [
            'password' => ['required', 'string', 'min:8'],
        ];
    }

    public function messages() {

        return [
            'password.required' => 'パスワードを入力してください',
            'password.string' => '不正な文字コードです',
            'password.min' => 'パスワードは8文字以内で入力してください',
        ];
    }

}
