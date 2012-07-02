<?php
	
/***********************************************************************
DateTime Class

This module has been developed by Luthfur R. Chowdhury for TimeSharp.com 
	
(c)2004 TimeSharp.com. All Rights Reserved.
************************************************************************/


class DateTime {
	
	var $day;
	var $month;
	var $year;
	var $day_of_week;
	var $week_num;
	var $hour;
	var $minute;
	var $second;
	var $timestamp;
	



	function DateTime( $d, $m, $y, $h=0, $min=0, $timestamp=0 ) {
		
		$this->day = $d;
		$this->month = $m;
		$this->year = $y;
		$this->hour = $h;
		$this->minute = $min;
		$this->second = 0;
		
				
		if($timestamp) {
			$this->SetTimeStamp($timestamp);
		} else {
			$this->day_of_week = date("w", mktime($this->hour,$this->minute,$this->second,$this->month, $this->day, $this->year));	
			$this->timestamp = mktime($this->hour,$this->minute,$this->second,$this->month, $this->day, $this->year);
		
		}
	}



	function IsWeekDay() {
		
		if($this->day_of_week != 0 && $this->day_of_week != 6) return 1;
		return 0;
	
	}




	function IsWeekEnd() {
		
		if($this->day_of_week == 0 || $this->day_of_week == 6) return 1;
		return 0;

	}


	

	function AddDay($num) {

		for($i=1; $i<=$num; $i++) {
			
			$this->day++;
		
			$end_of_month = date("j", mktime(0,0,0,$this->month, 0, $this->year));

			if($this->day > $end_of_month) {
				
				$this->day = 1;
				$this->AddMonth(1);
			
			}

		}


	}





	function AddMonth($num) {
		

		for($i=1; $i<=$num; $i++) {

			// Check if day needs to re assigned
			$end_of_month = date("j", mktime(0,0,0,$this->month + 1, 0, $this->year));
			
			for($i=1; $i<=$num; $i++) {
				$this->month++;
			}

			if($this->month > 12) {
				$this->month = 1;
				$this->year++;
			}
			

			if($this->day == $end_of_month) $this->day = date("j", mktime(0,0,0,$this->month + 1, 0, $this->year));

		}
			

	}





	function AddYear($num) {
		
		for($i=1; $i<=$num; $i++) { $this->year++; }
	}


	



	function AddWeek($num) {

		for($i=1; $i<=$num; $i++) {
			
			$this->AddDay(7);
		
		}
	}





	function AddHour() {
	}




	function AddMinute() {
	}




	function AddSecond(){
	}



	
	function RemoveDay($num) {
	
		for($i=1; $i<=$num; $i++) {

			$this->day--;
			if($this->day == 0) {
						
				$this->RemoveMonth(1);
								
				$this->day =  date("j", mktime(0,0,0,$this->month + 1, 0, $this->year));
			
			}

		}
	
	}




	function RemoveMonth($num) {
		
		for($i=1; $i<=$num; $i++) {

			// Check if day needs to re assigned
			$end_of_month = date("j", mktime(0,0,0,$this->month + 1, 0, $this->year));

			$this->month--;

			if($this->month == 0) {
				$this->month = 12;
				$this->year--;
			}

			if($this->day == $end_of_month) $this->day = date("j", mktime(0,0,0,$this->month + 1, 0, $this->year));

		}
	}



	function RemoveYear($num) {
		
		for($i=1; $i<=$num; $i++) { $this->year--; }

	}


	

	function RemoveWeek($num) {

		for($i=1; $i<=$num; $i++) {
					
			$this->RemoveDay(7);
		
		}
	}




	function SetWeekNum() {
		
		$weeknum = 1;
		
		if ( date("m", mktime(0,0,0,$this->month, $this->day, $this->year)) == date("m", mktime(0,0,0,$this->month, ($this->day - 7), $this->year)) ) {
			$weeknum = 2;
		}
		if ( date("m", mktime(0,0,0,$this->month, $this->day, $this->year)) == date("m", mktime(0,0,0,$this->month, ($this->day - 14), $this->year)) ) {
			$weeknum = 3;
		}
		if ( date("m", mktime(0,0,0,$this->month, $this->day, $this->year)) == date("m", mktime(0,0,0,$this->month, ($this->day - 21), $this->year)) ) {
			$weeknum = 4;
		}
		if ( date("m", mktime(0,0,0,$this->month, $this->day, $this->year)) == date("m", mktime(0,0,0,$this->month, ($this->day - 28), $this->year)) ) {
			$weeknum = 5;
		}
		
		$this->weeknum = $weeknum;
		
	}



	function SetTimeStamp($timestamp) {
		
		$this->timestamp = $timestamp;
		$this->day = date ( "j", $timestamp );
		$this->month = date ( "n", $timestamp );
		$this->year = date ( "Y", $timestamp );
		$this->hour = date ( "H", $timestamp );
		$this->minute = date ( "i", $timestamp );
		$this->second = date ( "s", $timestamp );

		$this->day_of_week = date ( "w", $timestamp );

		$this->SetWeekNum();

	
	}
	
	
	function GetTimeStamp() {
		
		return mktime ( $this->hour, $this->minute, $this->second, $this->month, $this->day, $this->year );

	}


	function FormatDate($format) {
		
		return date($format, $this->GetTimeStamp());
	
	}

	



	//function 

	
}