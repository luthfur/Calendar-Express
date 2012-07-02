<?php
	
/***********************************************************************
Get Events Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class GetEvents {
	
	var $day;
	var $month;
	var $year;
	
	
	
	/********** Set Variables ****************/
	function GetEvents($day, $month, $year) {
	
		$this->day = $day;
		$this->month = $month;
		$this->year = $year;
		
	}
	

	function ChangeMonth($month) {
		
		$this->month = $month;
	
	}
	
		
	
	function ChangeYear($year) {
		
		$this->year = $year;
	
	}


	
	/************** Get Event Data from DB **********************/
	function queryDB($cid=null, $catid = null, $pulluser=null) {
	
		global $DB, $_CONF;
		
		$occurence = $_CONF['occurence_table'];
		$event = $_CONF['event_table']; 
		$calendar = $_CONF['calendar_table']; 
		$location = $_CONF['location_table']; 
		$user = $_CONF['user_table']; 
		
		$month = $this->month;
		$year = $this->year;

		// calculate the end of the month
		$the_month = getdate(mktime(0,0,0,$month + 1,0,$year));
		$lastday = $the_month['mday']; 
		
		$cal_start_date = "$year-$month-01";
		$cal_end_date = "$year-$month-$lastday";
		
		
		$query = "SELECT * FROM $occurence, $event, $calendar, $location";
		
		if($pulluser) $query .= ", $user";
		
		$query .=" WHERE (($occurence.start_date >= '$cal_start_date' AND $occurence.start_date <= '$cal_end_date') || ($occurence.start_date <= '$cal_start_date' AND $occurence.stop_date >= '$cal_start_date'))";
		$query .= " AND $event.calendar_id = $calendar.calendar_id AND $event.type_id = $occurence.type_id AND $location.location_id = $event.location_id ";
		
		if($cid) $query .= " AND $event.calendar_id = $cid";
		if($catid) $query .= " AND $calendar.cat_id = $catid";
		if($pulluser) $query .= " AND $user.user_id = $event.user_id";

		$query .= " AND $event.approved = 1";
		
		//echo $query;
		
		$this->eventresult = $DB->Query($query);
	
	}
	
	
	
	
	
	
	/******************** Get Days Events ************************/
	function queryDay($day, $cid = null, $catid = null) {
	
		global $DB, $_CONF;
		
		$event = $_CONF['event_table'];
		$occurence = $_CONF['occurence_table'];
		$calendar = $_CONF['calendar_table'];
		$location = $_CONF['location_table']; 
		
		$month = $this->month;
		$year = $this->year;

		$cal_date = "$year-$month-$day";
		
		$query = "SELECT * FROM $occurence, $event, $calendar, $location WHERE $occurence.start_date <= '$cal_date' AND $occurence.stop_date >= '$cal_date'";
		$query .= " AND $event.calendar_id = $calendar.calendar_id AND $event.type_id = $occurence.type_id AND $location.location_id = $event.location_id";
		
		if($cid) $query .= " AND $event.calendar_id = $cid";
		if($catid) $query .= " AND $calendar.cat_id = $catid";

		$query .= " AND $event.approved = 1";
		//echo $query;
		
		$this->eventresult = $DB->Query($query);
		
	}
	
	
		
	
	
	
	/*****************  Get Event Data for the day ******************/
	function getEventData($day, $weekday) {
		
		global $Result, $WeekConv;
	
		$day = appendzero($day);
		$month = appendzero($this->month);
		$year = $this->year;

		$cal_date = "$year-$month-$day";
		
		// Convert to Data Week
		$weekday = $WeekConv->dataWeek($weekday);


		$Result->setResult($this->eventresult);
		
		$weeknum = getweeknum($day, $month, $year);
		
		$arraycollector = array();
		
		
		if($Result->numRows()) $Result->setPointer(0);
		
		while ($eventdata = $Result->getArray()) {
		
			if($eventdata['start_date'] <= $cal_date && $eventdata['stop_date'] >= $cal_date) {
					
				switch ($eventdata[event_type]) {
				
				case 1:
					if (($eventdata[start_date] == $cal_date))  array_push($arraycollector, $eventdata);
					break;
				
				case 2:
					array_push($arraycollector, $eventdata);
					break;
				
				case 3:
					if ($weekday == 2 || $weekday == 4)  array_push($arraycollector, $eventdata);
					break;
				
				case 4:
					if ($weekday == 1 || $weekday == 3 || $weekday == 5) array_push($arraycollector, $eventdata);
					break;
				
				case 5:
					if ($weekday >= 1 && $weekday <= 5) array_push($arraycollector, $eventdata);
					break;
				
				case 6:
					if ($weekday == 0 || $weekday == 6) array_push($arraycollector, $eventdata);
					break;
														
				case 7:
					if ($weekday == $eventdata[weekday]) array_push($arraycollector, $eventdata);
					break;
					
				case 8:
					if ($day == $eventdata[day]) array_push($arraycollector, $eventdata);
					break;
				
				case 9:
					if ($day == $eventdata[day] && $month == $eventdata[monthnum]) array_push($arraycollector, $eventdata);
					break;	
								
				case 10:
					if ($weekday == $eventdata[weekday] && $weeknum == $eventdata[weeknum]) array_push($arraycollector, $eventdata);
					break;
					
				case 11:
					if ($weekday == $eventdata[weekday] && $weeknum == $eventdata[weeknum] && $month == $eventdata[monthnum]) array_push($arraycollector, $eventdata);
					break;
					
				}
			
			}					
		}
		
		return $arraycollector;
			
	}
	
	
	
	
	
	
	/***************** Collect Day's Events ******************/
	function thisDay($day, $weekday, $cid=null, $catid=null) {
		
		$this->queryDay($day, $cid, $catid);
				
		$eventset = $this->getEventData($day, $weekday);
		
		return $eventset;
		
	}
	
		
	
	
	
	
	
	/***************** Collect Week's Events ******************/
	function thisWeek($week_array, $cid=null, $catid=null) {
	
		$this->queryDB($cid, $catid);
		
		reset($week_array);		
		$firstkey = key($week_array);
		end($week_array);
		$lastkey = key($week_array);
		
		//echo $firstkey . ", " . $lastkey;
		
		
		for($j=$firstkey; $j<=$lastkey; $j++) {
				
			if ($week_array[$j]) {
					$eventset[$j] = $this->getEventData($week_array[$j], $j);
			}
			
		}
		
		
		return $eventset;
		
	}
	
	
	
	
	
	
	/********************  BCollect Month's Events  **************************/
	function thisMonth($month_array, $cid=null, $catid=null) {
		
		$this->queryDB($cid, $catid);
		
		$eventset = array();
		
		
		for($i=1; $i<=6; $i++) {
			
			$week_array = $month_array[$i];
						
			for($j=0; $j<=6; $j++) {
				
				if ($week_array[$j]) {
					$eventset[$i][$j] = $this->getEventData($week_array[$j], $j);
				}
				
			}
					
		}
		
		return $eventset;
							
	}	
	

	


}