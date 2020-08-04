<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;

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

        // ユーザー情報取得
        $users = User::all();

        // 全ユーザーのメールアドレスのみ取得
        $emails = $users->pluck('email');

        return [
            'new_email' => ['required', 'string', 'email', 'max:255', Rule::notIn($emails)],
        ];
    }

    public function messages() {

        return [
            'new_email.required' => 'メールアドレスを入力してください',
            'new_email.email' => 'メールアドレスではないようです。メールアドレスを入力ください',
            'new_email.string' => '不正な文字コードです',
            'new_email.max' => 'メールアドレスは255文字以内で入力してください',
            'new_email.not_in' => 'そのメールアドレスは既に登録されています',
        ];
    }

}
