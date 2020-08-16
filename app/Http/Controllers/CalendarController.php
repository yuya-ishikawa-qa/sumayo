<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Calendar\CalendarView;
use App\Store;
use App\StoreHoliday;


class CalendarController extends Controller
{
   public function edit($id){
        
        $store = Store::findOrFail($id);
        $store_id = $store->id;
        $holidays = StoreHoliday::all(); 
        foreach ($holidays as $holiday) {
            $holidays_list[$holiday->date] = $holiday->is_holiday;
        }

        $calendar = new CalendarView(time());

		return view('stores.holiday', compact('calendar','store_id','holidays_list'));
    }

    public function update(Request $request, $id) {

        $store = Store::findOrFail($id);
        $store_id = $store->id;
        
        foreach ($request->all() as $key => $value) {

            if (preg_match('/^([0-9]{8})$/', $key)) {
                if ($value === '0' || $value === '1') {

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
