<?php
namespace App\Calendar;
use Carbon\Carbon;

class CalendarWeekDay {
	protected $carbon;

	function __construct($date){
		$this->carbon = new Carbon($date);
	}

	function getClassName(){

		return "day-" . strtolower($this->carbon->format("D"));
	}

	/**
	 * @return 
	 */
	function render(){

		return $this->carbon->format("Ymd");
	}

	function renderDayOfTheWeek() {
		
		Carbon::setLocale('ja');
		return $this->carbon->isoFormat("DD日(ddd)");
	}
}