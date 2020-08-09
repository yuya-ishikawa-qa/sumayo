<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserNameRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages() {

        return [
            'name.required' => '名前を入力してください',
            'name.string' => '不正な文字コードです',
            'name.max' => '名前は50文字以内で入力してください',
        ];
    }
}
