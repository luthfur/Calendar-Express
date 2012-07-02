<?php
	

/***********************************************************************
Week Generator Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Week {
	
	// declare  all necessary variables
		
		var $today;				// date today
		var $curmonthnum;		// current month number
		var $curmonth;			// current month name
		var $curday;			// current day, for example 12,13
		var $curweekday;		// current week day, for example: Saturday, Sunday
		var $curyear;			// current year (full form)
		var $month_array;		// array containing month
	
	
	
	
	
/********************* Class Constructor ***************************/
	function Week() {
		
		// get today's date
		$today = time();
		$today = getdate($today);
		$this->curmonthnum = $today["mon"];
		$this->curmonth = $today["month"];
		$this->curday = $today["mday"];
		$this->curweekday = $today["wday"];
		$this->curyear = $today["year"];	
	
			
	}
	
	
	
	

/******************* Get dates for a particular **********************/
	function setMonth($month_array) {
						
		/*************derive week pointer*************/
		$today = $this->curday;
		$the_array = $month_array;
		
		
		//initialize counter and flag
		$found = 0;
		$count = 1;
	
		while (!$found AND $count <= 6) {
			if(isset($the_array[$count])) {
				if ($the_key = array_keys($the_array[$count], $today)) $found = 1;
			}
			if(!$found) $count++;
		}
		
		$this->pointer_week = $count;
		
	}	
	
	
	
	
	
/******************** Show This Week *********************************/
	function getNum() {
		$count = $this->pointer_week;
		return $count;
	}
	
	
	
	

/******************** Show Next Week *********************************/
	function next() {
		$count = $this->pointer_week;
		$count++;
		$this->pointer_week = $count;
		return $count;
	}





/******************** Show Prev Week *********************************/
	function prev() {
		$count = $this->pointer_week;
		$count--;
		$this->pointer_week = $count;
		return $count;
	}





/******************** Get Week Number*********************************/
	function getweek($the_day) {
		// set month array
		$this->month_array = $month;
		
		
		/*************derive week pointer*************/
		$the_array = $this->month_array;
		
		
		//initialize counter and flag
		$found = 0;
		$count = 1;
	
		while (!$found AND $count <= 6) {
			if ($the_key = array_keys($the_array[$count], $the_day)) $found = 1;
			if(!$found) $count++;		
		}
		
		$this->pointer_week = $count;
		
		return $count;
	}		



}
	
?>