<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInfoRequest extends FormRequest
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

            'name' => 'required|max:100',
            'phone' => 'required|regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/|max:100',
            'postcode' => 'required|regex:/^[0-9]{3}-[0-9]{4}$/',
            'address' => 'required',
            'comment' => 'required',
        ];
    }

    public function messages() {

        return [

            'name.required' => '店名を入力してください',
            'name.max' => '最大文字数は100文字です',

            'phone.required' => '電話番号を入力してください',
            'phone.regex' => '電話番号はxxx-xxxx-xxxxのようにハイフン付きで半角入力ください',

            'postcode.required' => '郵便番号を入力してください',
            'postcode.regex' => '郵便番号はxxx-xxxxの形式でにハイフン付きで半角入力ください',
            
            'address.required' => '住所を入力してください',

            'comment.required' => 'コメントを入力してください',
            
        ];
    }


}
