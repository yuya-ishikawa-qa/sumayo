<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImagesRequest extends FormRequest
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
            'top_images.top_image1' => 'file|image|mimes:jpeg,png,jpg|',
            'top_images.top_image2' => 'file|image|mimes:jpeg,png,jpg|',
            'top_images.top_image3' => 'file|image|mimes:jpeg,png,jpg|',
        ];
    }

    public function messages()
    {
        return [

            // TOP画像1
            'top_images.top_image1.file' => 'ファイルを添付してください',
            'top_images.top_image1.image' => '画像ファイルを添付してください',
            'top_images.top_image1.mines' => '画像ファイルは.jpeg/.jpgもしくは.pngを指定してください',

            
            'top_images.top_image2.file' => 'ファイルを添付してください',
            'top_images.top_image2.image' => '画像ファイルを添付してください',
            'top_images.top_image2.mines' => '画像ファイルは.jpeg/.jpgもしくは.pngを指定してください',

            
            'top_images.top_image3.file' => 'ファイルを添付してください',
            'top_images.top_image3.image' => '画像ファイルを添付してください',
            'top_images.top_image3.mines' => '画像ファイルは.jpeg/.jpgもしくは.pngを指定してください',



        ];
    }
}
