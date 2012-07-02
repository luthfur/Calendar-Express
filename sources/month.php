<?php


/***********************************************************************
Month Generator Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Month {
		
		// declare all necessary variables
			
		var $today;				// date today
		var $curmonthnum;		// current month number
		var $curmonth;			// current month name
		var $curday;			// current day, for example 12,13
		var $curweekday;		// current week day, for example: Saturday, Sunday
		var $curyear;			// current year (full form)
		var $month_array;		// array containing month
	
		
	
	
	
/*********************** Class Constructor ***************************/
	function Month() {
	
		// get todays date
		$today = time();
		$today = getdate($today);
		$this->curmonthnum = $today["mon"];
		$this->curmonth = $today["month"];
		$this->curday = $today["mday"];
		$this->curweekday = $today["wday"];
		$this->curyear = $today["year"];
				
		$this->generate();
		
	}
	
	
	


/*********************** Generate Array ***************************/
	function generate( $monthnum=null , $year=null ){
		
		global $WeekConv;
		
		if(!$monthnum) $monthnum = $this->curmonthnum;
		if(!$year) $year = $this->curyear;
				
		// calculate the beginning of the month
		$the_month = getdate(mktime(0,0,0,$monthnum,1,$year));
		$firstday = $the_month['mday'];
		$weeknum = $the_month['wday'];
		$monthname = $the_month['month'];
		
		// calculate the end of the month
		$the_month = getdate(mktime(0,0,0,$monthnum + 1,0,$year));
		$lastday = $the_month['mday']; 
		
		// Convert Week Number for Display
		$weeknum = $WeekConv->dispWeek($weeknum);
		
		$day = 1;
		// begin array insertion
		for ($i=0; $i<7; $i++) {
			if ($i == $weeknum) {
				$the_array[1][$i] = $day;
				$pointer = $i;
			}
		}
		
		// increment pointer and date
		$pointer++;
		$day++;
		
		
		// complete insertion of first row
		for ($i=$pointer; $i<7; $i++) {
			$the_array[1][$i] = $day++;
		}
	
	
		
		// complete insertion of the rest of the month
		for ($i=2; $i<=6; $i++) {
			for($j=0; $j<=6; $j++) {
				if ($day <= $lastday) {
					$the_array[$i][$j] = $day++;
				}
			}			
		}
		
				
		// assign array
		$this->month_array = $the_array;
		return $this->month_array;		
	}
	
	





/***********************Generate Array***************************/
	function current() {
		$this->generate();
	}	


}




?>