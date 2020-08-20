<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Buy;


class BuyRequest extends FormRequest
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
            'last_name' => ['required', 'string', 'max:50'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name_kana' => ['required', 'string', 'not_regex:/^[ァ-ヾ]+$/u', 'max:50'],
            'first_name_kana' => ['required', 'string', 'not_regex:/^[ァ-ヾ]+$/u', 'max:50'],
            'tel' => ['required', 'string', 'not_regex:/^0\d{2,3}-\d{1,4}-\d{4}$/', 'max:15'],
            'mail' => ['required', 'string', 'email', 'max:255'],
            'recieved_date' => ['required', 'date_format'],
            'recieved_time' => ['required', 'string', 'not_regex:/^([01][0-9]|2[0-3]):[0-5][0-9]$/'],
            'comment' => 'nullable',
        ];
    }

    public function messages() {

        return [

            'last_name.required'=>'名前を入力してください',
            'last_name.max'=>'名前は50文字以内で入力してください',

            'first_name.required'=>'名前を入力してください',
            'first_name.max'=>'名前は50文字以内で入力してください',

            'last_name_kana.required'=>'フリガナを入力してください',
            'last_name_kana.not_regex'=>'カタカナで入力してください',
            'last_name_kana.max'=>'フリガナは50文字以内で入力してください',

            'first_name_kana.required'=>'フリガナを入力してください',
            'first_name_kana.not_regex'=>'カタカナで入力してください',
            'first_name_kana.max'=>'名前は50文字以内で入力してください',

            'email.required'=>'電話番号を入力してください',
            'email.not_regex'=>'電話番号が不正です',
            'email.max'=>'電話番号は15文字以内で入力してください',

            'email.required'=>'メールアドレスを入力してください',
            'email.email'=>'メールアドレスが不正です',
            'email.max'=>'メールアドレスは255文字以内で入力してください',

            'recieved_date.required'=>'受取日を入力してください',
            'recieved_date.date_format'=>'受取日が不正です',

            'recieved_time.required'=>'受取時間を入力してください',
            'recieved_time.not_regex'=>'受取時間が不正です',

        ];



    }

}
