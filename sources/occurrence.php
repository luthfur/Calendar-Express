<?php
	
/***********************************************************************
Occurrence Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Occurrence {
	
	
	
	/***************** Add New Occurence ****************************/
	function addNew($vals) {
	
		global $DB, $_CONF, $Result;
		
		$occurence = $_CONF['occurence_table'];
		
		extract(filter($vals));

		$start_date = "$start_year-$start_month-$start_day";
		$stop_date = "$stop_year-$stop_month-$stop_day";
	
		// get day of the week
		$weekday = date("w", mktime(0,0,0,$start_month, $start_day, $start_year));
		
		// get week number
		$weeknum = getweeknum($start_day, $start_month, $start_year);

		$query = "INSERT INTO $occurence VALUES( NULL, $event_type, $start_day, $weekday, $weeknum, $start_month, '$start_date', '$stop_date')";
		
		//echo $query;

		$DB->Query($query);

		$query = "SELECT type_id FROM $occurence ORDER BY type_id DESC LIMIT 0, 1";
		
		$data = $Result->getRow($DB->Query($query));
		
		return $data[0];

	}
	
	
	
	
	/**************** Update Location  ****************************/
	function Update($vals, $lid) {
		
		global $DB, $_CONF;
		
		$location = $_CONF['location_table'];
		
		extract($vals);
		
		$query = "UPDATE $location SET location_title = '$location_title', 
		                                address_1 = '$address_1', 
									    address_2 = '$address_2', 
										city = '$city', 
										state = '$state', 
										zip = $zip, 
										location_desc = '$location_desc'
										WHERE location_id = $lid";
		
		$DB->Query($query);
	
	}
	
	
	
	
	
	/*************** Delete Location ****************************/
	function Delete($lid) {
		
		global $DB, $_CONF;
		
		$location = $_CONF['location_table'];
		
		$query = "DELETE FROM $location WHERE location_id = $lid";
		
		$DB->Query($query);
		
		
	}
	


}

