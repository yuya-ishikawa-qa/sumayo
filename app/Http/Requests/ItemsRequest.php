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
            'price' => 'required|integer',
            'tax' => 'required|integer|max:50',
            'stock_all' => 'nullable|integer',
            'stock_monday' => 'required|integer',
            'stock_tuesday' => 'required|integer',
            'stock_wednesday' => 'required|integer',
            'stock_thursday' => 'required|integer',
            'stock_friday' => 'required|integer',
            'stock_saturday' => 'required|integer',
            'stock_sunday' => 'required|integer',
            'path' =>  'file|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages() {

        return [
            'item_name.required' => '商品名を入力してください',
            'description.required' => '商品説明を入力してください',
            'price.required' => '価格は数値(半角)を入力してください',
            'tax.required' => '消費税は数値(半角)を入力してください',
            'stock_all.required' => '在庫数は数量(半角)を入力してください',
            'stock_monday.required' => '在庫数は数量(半角)を入力してください',
            'stock_tuesday.required' => '在庫数は数量(半角)を入力してください',
            'stock_wednesday.required' => '在庫数は数量(半角)を入力してください',
            'stock_thursday.required' => '在庫数は数量(半角)を入力してください',
            'stock_friday.required' => '在庫数は数量(半角)を入力してください',
            'stock_saturday.required' => '在庫数は数量(半角)を入力してください',
            'stock_sunday.required' => '在庫数は数量(半角)を入力してください',
            'path.required.required' => '画像ファイル(jpg、png、bmp、gif)を選択してください',

        ];
    }

    public function attributes()
{
    return [
        'path' => '画像ファイル(jpg、png、bmp、gif)を選択してください',
    ];
}
}