<?php
	
/***********************************************************************
Location Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Location {
	
	
	
	/***************** Add New Location ****************************/
	function addNew($vals, $uid) {
	
		global $DB, $_CONF, $Result;
		
		$location = $_CONF['location_table'];
		
		extract(filter($vals));
		
		$query = "INSERT INTO $location VALUES( NULL, $uid, '$location_title', '$address_1', '$address_2', '$city', '$state', '$zip', '$location_desc')";
		
		//echo $query;
		
		
		$DB->Query($query);

		$query = "SELECT location_id FROM $location ORDER BY location_id DESC LIMIT 0, 1";
		
		$data = $Result->getRow($DB->Query($query));
		
		return $data[0];
		
	}
	
	
	
	
	/**************** Update Location ****************************/
	function Update($vals) {
		
		global $DB, $_CONF;
		
		$location = $_CONF['location_table'];
		
		extract(filter($vals));
		
		$query = "UPDATE $location SET ";
		
		if($location_title) $query .= "location_title = '$location_title',"; 
		$query .= " address_1 = '$address_1', 
									    address_2 = '$address_2', 
										city = '$city', 
										state = '$state', 
										zip = '$zip'"; 
					
		if($location_desc) $query .= ", location_desc = '$location_desc'";
		$query .= " WHERE location_id = $location_id";
		
		//echo $query;
		
		$DB->Query($query);
	
	}
	
	
	
	
	
	/*************** Delete Location ****************************/
	function Delete($lid) {
		
		global $DB, $_CONF, $Event, $Result;
		
		$location = $_CONF['location_table'];
		$event = $_CONF['event_table'];
		$occ = $_CONF['occurence_table'];
		
		$query = "DELETE FROM $location WHERE location_id = $lid";
		
		$DB->Query($query);

		$query = "SELECT * FROM $event WHERE location_id = $lid";

		$result = $DB->Query($query);

		while($data = $Result->getArray($result)) {
					
			$Event->Delete($data['event_id']);


		}

		
		
		
	}
	


}

