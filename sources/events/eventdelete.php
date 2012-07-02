<?php
	
/***********************************************************************
Event Deletion Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class EventDelete {
	
	var $day_from;
	var $month_from;
	var $year_from;
	var $day_to;
	var $month_to;
	var $year_to;
	
			
	
	
	/********************** Delete Single Events ***********************/
	function Single($eid) {
		
		global $DB, $_CONF;
		
		$event = $_CONF['event_table'];
		$occurence = $_CONF['occurence_table'];
		
		$query = "DELETE FROM $event, $occurence WHERE $event.event_id = $eid AND $event.type_id = $occurence.type_id";
		
		$DB->Query($query);
	}
	
	
	
	
	/******************* Set the Delete From Date ***********************/
	function setFromDate($day, $month, $year) {
	
		$this->day_from = $day;
		$this->month_from = $month;
		$this->year_from = $year;
	
	} 
	



	/******************* Set the Delete To Date ***********************/
	function setToDate($day, $month, $year) {
	
		$this->day_to = $day;
		$this->month_to = $month;
		$this->year_to = $year;
	
	} 

	
	
	
	
	/********************** Delete Mass Events ***********************/
	function Mass() {
		
		global $DB;
		
		$event = $_CONF['event_table'];
		$occurence = $_CONF['occurence_table'];
			
		$day_from = $this->day_from;
		$month_from = $this->month_from;
		$year_from = $this->year_from;
		$day_to = $this->day_to;
		$month_to = $this->month_to;
		$year_to = $this->year_to;
		
		$query = "DELETE FROM $event, $occurence WHERE $event.type_id = $occurence.type_id";
		
		if($day_from) $query .= " AND start_day >= $day_from AND start_month >= $month_from AND start_year >= $year_from";
		
		$query .= " AND stop_day <= $day_to AND stop_month <= $month_to AND stop_year <= $year_to";
		
		$DB->Query($query);
		
	}

		
	
}