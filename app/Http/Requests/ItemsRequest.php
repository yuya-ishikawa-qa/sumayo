<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Items;

class ItemsRequest extends FormRequest
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

    // バリデーションあとでやる
    public function rules()
    {
        return [
            'item_name' => 'required|string|max:50',
            'description' => 'required|string|max:100',
            'price' => 'required|string|max:50',
            'stock_all' => 'nullable|numeric',
            'stock_monday' => 'nullable|numeric',
            'stock_tuesday' => 'nullable|numeric',
            'stock_wednesday' => 'nullable|numeric',
            'stock_thursday' => 'nullable|numeric',
            'stock_saturday' => 'nullable|numeric',
            'stock_sunday' => 'nullable|numeric',
        ];
    }

    public function messages() {

        return [
            'item_name.required' => '商品名を入力してください',
            'price.required' => '価格は数量(半角)を入力してください',
            'description.required' => '商品説明を入力してください',
            'stock_all.required' => '在庫数は数量(半角)を入力してください',
        ];
    }
}