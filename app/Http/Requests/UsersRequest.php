<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages() {

        return [

            'name.required'=>'名前を入力してください',
            'name.max'=>'名前は50文字以内で入力してください',

            'email.required'=>'メールアドレスを入力してください',
            'email.max'=>'メールアドレスは255文字以内で入力してください',
            'email.unique'=>'そのメールアドレスは既に登録されています',
            
            'password.required'=>'パスワードを入力してください',
            'password.min'=>'パスワードは8文字以上の半角英数字で入力してください',
            'password.confirmed'=>'パスワードは同じものを入力してください',

        ];



    }

}
