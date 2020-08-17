<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar\CalendarView;
use App\Store;
use App\StoreHoliday;


class CalendarController extends Controller
{
   public function edit(Request $request, $id){
        
        // store_id 取得
        $store = Store::findOrFail($id);
        $store_id = $store->id;
        
        //クエリーのdateを受け取る
        $date = $request->input('date');
        
		//dateがYYYY-MMの形式でない場合nullを返す
		if (!($date && preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])$/', $date))){
			$date = null;
		}
        
		//取得出来ない時は現在(=今月)を指定する
        if (!$date){
            $date = time();
        }

		//カレンダーに日付を渡す
		$calendar = new CalendarView($date);

        // 休日情報取得
        $holidays = StoreHoliday::all(); 
        foreach ($holidays as $holiday) {
            $holidays_list[$holiday->date] = $holiday->is_holiday;
        }

		return view('stores.holiday', compact('calendar','store_id','holidays_list'));
    }

    public function update(Request $request, $id) {

        $store = Store::findOrFail($id);
        $store_id = $store->id;
        
        foreach ($request->all() as $key => $value) {

            if (preg_match('/^[0-9]{4}(0[1-9]|1[0-2])(0[1-9]|[12][0-9]|3[01])$/', $key)) {
                if ($value == '1' || $value === '0') {

                    $holidays = StoreHoliday::UpdateOrcreate(
                        ['store_id' => $store_id, 'date' => $key],
                        ['is_holiday' => $value]
                    );
                } else {  
                    return back()->with('error_message', '不正なアクセスです');
                }
            }

        }

        return back()->with('flash_message', '休日の設定が完了しました');
        
    }
    
}
