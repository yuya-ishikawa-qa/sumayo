<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTimesRequest extends FormRequest
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

            'start_hour' => 'required|regex:/^[0-9]{1,2}$/|between:0,23',
            'start_min' => 'required|regex:/^[0-9]{1,2}$/|between:0,59',
            
            'end_hour' => 'required|regex:/^[0-9]{1,2}$/|between:0,23',
            'end_min' => 'required|regex:/^[0-9]{1,2}$/|between:0,59',

            'serve_range_time' => 'required|between:0,120|regex:/^[0-9]{1,3}$/',
            'capacity' => 'required|regex:/^[0-9]{1,3}$/|between:1,100',
            'earliest_receivable_time' => 'required|regex:/^[0-9]{1,4}$/|between:1,1439',
            
        ];
    }

    public function messages() 
    {
        return [

            'start_hour.required' => '開店時間 "(時)" が選択されていません',
            'start_hour.regex' => '不正な入力です',
            'start_hour.min' => '不正な入力です',
            'start_hour.max' => '不正な入力です',
            
            'start_min.required' => '開店時間 "(分)" が選択されていません',
            'start_min.regex' => '不正な入力です',
            'start_min.min' => '不正な入力です',
            'start_min.max' => '不正な入力です',
            
            'end_hour.required' => '閉店時間 "(時)" が選択されていません',
            'end_hour.regex' => '不正な入力です',
            'end_hour.min' => '不正な入力です',
            'end_hour.max' => '不正な入力です',

            'end_min.required' => '開店時間 "(分)" が選択されていません',
            'end_min.regex' => '不正な入力です',
            'end_min.min' => '不正な入力です',
            'end_min.max' => '不正な入力です',
            
            'serve_range_time.required' => '予約単位時間を入力してください',
            'serve_range_time.regex' => '数字を入力してください。',
            'serve_range_time.min' => '不正な入力です',
            'serve_range_time.max' => '不正な入力です',
            
            'capacity.required' => '予約可能数が入力されていません',
            'capacity.regex' => '数字を入力してください。また最大値は100です',
            'capacity.min' => '1以上で入力してください',
            'capacity.max' => '100以下で入力してください',

            'earliest_receivable_time.required' => '最短受取可能時間が入力されていません',
            'earliest_receivable_time.regex' => '数字を入力してください。また最大値は1439分(23時間59分)です',
            'earliest_receivable_time.min' => '1分以上で入力してください',
            'earliest_receivable_time.max' => '1439分以下(23時間59分)で入力してください',
            
        ];
    }
}
