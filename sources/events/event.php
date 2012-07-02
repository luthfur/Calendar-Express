<?php
	
/***********************************************************************
Event Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Event {

		
	
	
	/********************  Event Exists **************************/
	function Approve($id) {
	
		global $DB, $_CONF;
		
		$event = $_CONF['event_table'];
				
		$query = "UPDATE $event SET approved = 1 WHERE event_id = $id";

		$DB->Query($query);
		
		// Send Email
	
	}
	
	
	
	/********************  Event Exists **************************/
	function Reject($id) {
							
		$this->Delete($id);
		
		// Send Email
		
	}
	
	
	
	/********************  Event Exists **************************/
	function addNew($vals, $type_id, $lid, $user_id, $conid, $approved) {
	
		global $DB, $_CONF;

		extract(filter($vals));

		$event = $_CONF['event_table'];
		
		if($start_hour) {

			$start_time = convtime($start_hour, $start_min, $start_dst);
			$stop_time = convtime($stop_hour, $stop_min, $stop_dst);

			$start_time = "'" . $start_time . "'";
			$stop_time = "'" . $stop_time . "'";

		
		} else {
				
			$start_time = "NULL";
			$stop_time = "NULL";	

		}

					
		$query = "INSERT INTO $event VALUES (NULL, $type_id, $calendar_id, $lid, $user_id, $conid, '$event_title', $start_time, $stop_time,'$text_time', '$event_desc', $approved, '', 1)";
		
		//echo $query;

		$DB->Query($query);

	}
	
	



	function ResetUser($id) {
		
		global $DB, $_CONF;

		$event = $_CONF['event_table'];

		$query = "UPDATE $event SET user_id = 1 WHERE user_id = $id";

		$DB->Query($query);

	
	}

	

	/************************* Update Event Data ***********************/
	function Update($vals) {
		
		global $DB, $_CONF, $_EVENT_TYPE;
		
		extract(filter($vals));

				
		$event = $_CONF['event_table'];
		
		if($start_hour) {

			$start_time = convtime($start_hour, $start_min, $start_dst);
			$stop_time = convtime($stop_hour, $stop_min, $stop_dst);

			$start_time = "'" . $start_time . "'";
			$stop_time = "'" . $stop_time . "'";
			
		
		} else {

			$start_time = "NULL";
			$stop_time = "NULL";
		
		}

							
		$query = "UPDATE $event SET calendar_id = $calendar_id, location_id = $location_id, contact_id =  $contact_id";
		
		if($event_title) $query .=" ,event_title = '$event_title'";
		if($event_desc) $query .=" ,event_desc = '" . $event_desc . "'";

		$query .= " ,start_time = $start_time, stop_time = $stop_time";
		
		 $query .=" ,text_time = '$text_time'";

		$query .=" WHERE event_id = $event_id";

	//	echo $query;
		

		$DB->Query($query);

		$occ = $_CONF['occurence_table'];
		
		$start_date = "$start_year-$start_month-$start_day";
		$stop_date = "$stop_year-$stop_month-$stop_day";

		$start_stamp = mktime ( 0, 0, 0, $start_month, $start_day, $start_year);
		$stop_stamp = mktime ( 0, 0, 0, $stop_month, $stop_day, $stop_year);

		// get day of the week
		$weekday = date("w", mktime(0,0,0,$start_month, $start_day, $start_year));
		
		// get week number
		$weeknum = getweeknum($start_day, $start_month, $start_year);

		$query = "UPDATE $occ SET event_type = $event_type, day = $start_day, weekday = $weekday, weeknum = $weeknum, monthnum = $start_month";

		if($start_stamp <= $stop_stamp) $query .= ", start_date = '$start_date', stop_date = '$stop_date'";
		
		$query .= " WHERE type_id = $type_id";

		//echo $query;

		$DB->Query($query);
		
	}



	/*********************** Delete Selected Events **********************/
	function Delete($eid) {
	
		global $DB, $Result, $_CONF;
		
		$event = $_CONF['event_table'];

		$query = "SELECT type_id FROM $event WHERE event_id = $eid";

		$data = $Result->getRow($DB->Query($query));
		
		$type_id = $data[0];

		$query = "DELETE FROM $event WHERE event_id = $eid";
		
		$DB->Query($query);

		$query = "DELETE FROM $_CONF[occurence_table] WHERE type_id = $type_id";
		
		$DB->Query($query);
	
	}
	
	
}
	
	