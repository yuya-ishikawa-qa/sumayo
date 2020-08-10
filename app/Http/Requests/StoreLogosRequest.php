<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLogosRequest extends FormRequest
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
            'logo' => 'required|file|image|mimes:jpeg,png,jpg|',
        ];
    }

    public function messages()
    {
        return [
            'logo.required' => '添付がされていません。画像ファイルを添付してください',
            'logo.file' => '添付がされていません。画像ファイルを添付してください',
            'logo.image' => '画像ファイルを添付してください',
            'logo.mines' => '画像ファイルは.jpeg/.jpgもしくは.pngを指定してください',
        ];
    }
}
