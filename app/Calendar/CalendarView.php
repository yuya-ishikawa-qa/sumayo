<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarView {

	private $carbon;

	// 日付取得
	function __construct($date){
		$this->carbon = new Carbon($date);
	}
	
	// 年月取得関数
	public function getTitle(){
		return $this->carbon->format('Y年n月');
	}

	// 曜日取得関数
	public function getDayOfTheWeek(){

		Carbon::setLocale('ja');
		return $this->carbon->isoFormat('(ddd)');
	}

	// 週取得関数
	public function getWeeks(){
		$weeks = [];

		//初日
		$firstDay = $this->carbon->copy()->firstOfMonth();

		//月末まで
		$lastDay = $this->carbon->copy()->lastOfMonth();

		//1週目
		$week = new CalendarWeek($firstDay->copy());
		$weeks[] = $week;

		//作業用の日
		$tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

		//月末までループさせる
		while($tmpDay->lte($lastDay)){
			//週カレンダーViewを作成する
			$week = new CalendarWeek($tmpDay, count($weeks));
			$weeks[] = $week;
			
						//次の週=+7日する
			$tmpDay->addDay(7);
		}

		return $weeks;
	}

	// 次月を取得
	public function getNextMonth(){
		return $this->carbon->copy()->addMonthsNoOverflow()->format('Y-m');
	}
	
	// 前月を取得
	public function getPreviousMonth(){
		return $this->carbon->copy()->subMonthsNoOverflow()->format('Y-m');
	}

}
