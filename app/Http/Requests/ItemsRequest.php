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
            'tax' => 'required|integer|between:0,100',
            'stock_all' => 'nullable|integer',
            'stock_monday' => 'required|integer',
            'stock_tuesday' => 'required|integer',
            'stock_wednesday' => 'required|integer',
            'stock_thursday' => 'required|integer',
            'stock_friday' => 'required|integer',
            'stock_saturday' => 'required|integer',
            'stock_sunday' => 'required|integer',
            'path' =>  'file|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages() {

        return [
            // 商品名
            'item_name.required' => '商品名を入力してください',
            'item_name.max' => '最大文字数は50文字です',

            // 商品説明
            'description.required' => '商品説明を入力してください',
            'description.max' => '最大文字数は100文字です',

            // 画像
            'path.file' => 'ファイルを添付してください',
            'path.image' => '画像ファイルを添付してください',
            'path.mines' => '画像ファイルは.jpeg/.jpgもしくは.pngを指定してください',

            // 価格
            'price.required' => '価格は数値(半角)を入力してください',
            'price.integer' => '価格は数値(半角)を入力してください',

            // 消費税
            'tax.required' => '消費税は数値(半角)を入力してください',
            'tax.integer' => '消費税は数値(半角)を入力してください',
            'tax.between' => '0〜100の間で入力してください',

            // 在庫数
            'stock_all.required' => '在庫数は数量(半角)を入力してください',
            'stock_monday.required' => '在庫数は数量(半角)を入力してください',
            'stock_tuesday.required' => '在庫数は数量(半角)を入力してください',
            'stock_wednesday.required' => '在庫数は数量(半角)を入力してください',
            'stock_thursday.required' => '在庫数は数量(半角)を入力してください',
            'stock_friday.required' => '在庫数は数量(半角)を入力してください',
            'stock_saturday.required' => '在庫数は数量(半角)を入力してください',
            'stock_sunday.required' => '在庫数は数量(半角)を入力してください',
            'stock_all.integer' => '在庫数は数量(半角)を入力してください',
            'stock_monday.integer' => '在庫数は数量(半角)を入力してください',
            'stock_tuesday.integer' => '在庫数は数量(半角)を入力してください',
            'stock_wednesday.integer' => '在庫数は数量(半角)を入力してください',
            'stock_thursday.integer' => '在庫数は数量(半角)を入力してください',
            'stock_friday.integer' => '在庫数は数量(半角)を入力してください',
            'stock_saturday.integer' => '在庫数は数量(半角)を入力してください',
            'stock_sunday.integer' => '在庫数は数量(半角)を入力してください',

        ];
    }
}