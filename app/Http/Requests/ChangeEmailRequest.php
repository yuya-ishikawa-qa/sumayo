<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangeEmailRequest extends FormRequest
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
            'new_email' => ['required', 'string', 'email', 'max:255',],
        ];
    }

    public function messages() {

        return [
            'new_email.required' => 'メールアドレスを入力してください',
            'new_email.email' => 'きちんとメールアドレスを入力してください',
            'new_email.string' => '不正な文字コードです',
            'new_email.max' => 'メールアドレスは255文字以内で入力してください',
            'new_email.unique' => 'そのメールアドレスは既に登録されています',
        ];
    }

}
