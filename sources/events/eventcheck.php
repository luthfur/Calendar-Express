<?php
	
/***********************************************************************
Event Existence Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class EventCheck {

	var $existance;
	var $eventresult;
	var $day;
	var $month;	
	var $year;
	
		
	
	/******************** Class Constructor *********************/
	function EventCheck($day, $month, $year) {
		
		$this->day = $day;	
		$this->month = $month;	
		$this->year = $year;
	
	}
	
	
	
	
	/********************  Check Existence in Month **************************/
	function inMonth($cid=null, $catid = null) {
		
		global $DB, $_CONF;
		
		$occurence = $_CONF['occurence_table'];
		$event = $_CONF['event_table']; 
		$cal = $_CONF['calendar_table'];
		
		$month = appendzero($this->month);
		$year = $this->year;
		
		// calculate the end of the month
		$the_month = getdate(mktime(0,0,0,$month + 1,0,$year));
		$lastday = $the_month['mday']; 
		
		$cal_start_date = "$year-$month-01";
		$cal_end_date = "$year-$month-$lastday";
		
		$query = "SELECT * FROM $cal, $occurence, $event WHERE (($occurence.start_date >= '$cal_start_date' AND $occurence.start_date <= '$cal_end_date') || ($occurence.start_date <= '$cal_start_date' AND $occurence.stop_date >= '$cal_start_date'))";
		$query .= " AND $event.type_id = $occurence.type_id  AND $event.calendar_id = $cal.calendar_id";

		if($cid) $query .= " AND $event.calendar_id = $cid";
		if($catid) $query .= " AND $cal.cat_id = $catid";

		$query .= " AND $event.approved = 1";
		
		// echo $query;
		
		$this->eventresult = $DB->Query($query);
		
	}
		


	
	/********************  Build the Existence Array  **************************/
	function thisMonth($month_array, $cid=null, $catid=null, $month=null) {
		
		if($month) $this->month=$month;
		
		$this->inMonth($cid, $catid);
		
		$existarray = array();
		
		
		for($i=1; $i<=6; $i++) {
			
			$thearray = $month_array[$i];
						
			for($j=0; $j<=6; $j++) {
				
				if ($thearray[$j]) {
					if($this->EventExists($thearray[$j], $j)) {
						$existarray[$i][$j] = 1;
					} else {
						$existarray[$i][$j] = 0;
					}
				}
				
			}
					
		}
			
		
		return $existarray;
			
	}
	
	
	
	
	
	/***************** Check whether Event Exists ******************/
	function EventExists($day, $weekday) {
		
		global $Result, $WeekConv;
		
		$day = appendzero($day);
		$month = appendzero($this->month);
		$year = $this->year;
		
		// Convert to Data Week For Database Comparison
		$weekday = $WeekConv->dataWeek($weekday);

		$cal_date = "$year-$month-$day";
		
		//echo $cal_date;

		$Result->setResult($this->eventresult);
		
		$weeknum = getweeknum($day, $month, $year);
		
		
		if($Result->numRows()) $Result->setPointer(0);
		while ($eventdata = $Result->getArray()) {
									
			if($eventdata['start_date'] <= $cal_date && $eventdata['stop_date'] >= $cal_date) {
							
				switch ($eventdata[event_type]) {
				
				case 1:
					if (($eventdata[start_date] == $cal_date))	return 1;
					break;
								
				case 2:
					return 1;
					break;
								
				case 3:
					if ($weekday == 2 || $weekday == 4) return 1;
					break;
				
				case 4:
					if ($weekday == 1 || $weekday == 3 || $weekday == 5) return 1;
					break;
				
				case 5:
					if ($weekday >= 1 && $weekday <= 5) return 1;
					break;
				
				case 6:
					if ($weekday == 0 || $weekday == 6) return 1;
					break;
														
				case 7:
					if ($weekday == $eventdata[weekday]) return 1;
					break;
					
				case 8:
					if ($day == $eventdata[day]) return 1;
					break;
				
				case 9:
					if ($day == $eventdata[day] && $month == $eventdata[monthnum]) return 1;
					break;	
								
				case 10:
					if ($weekday == $eventdata[weekday] && $weeknum == $eventdata[weeknum]) return 1;
					break;
					
				case 11:
					if ($weekday == $eventdata[weekday] && $weeknum == $eventdata[weeknum] && $month == $eventdata[monthnum]) return 1;
					break;
					
				}
			
			}
									
		}
		
		return 0;
			
	}
	

}

?>