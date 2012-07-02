<?php
	
/***********************************************************************
Contact Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Contact {
	
	
	
	/***************** Add New Location ****************************/
	function addNew($vals, $uid) {
	
		global $DB, $_CONF, $Result;

		if (!$vals[contact_name]) return 1;
		
		$contact = $_CONF['contact_table'];
		
		extract(filter($vals));

		$query = "INSERT INTO $contact VALUES( NULL, $uid, '$contact_name', '$contact_email', '$contact_phone')";
		
		$DB->Query($query);

		$query = "SELECT contact_id FROM $contact ORDER BY contact_id DESC LIMIT 0, 1";
		
		$data = $Result->getRow($DB->Query($query));
		
		return $data[0];
		
	
	}
	
	
	
	
	/**************** Update Location  ****************************/
	function Update($vals) {
		
		global $DB, $_CONF;
		
		$contact = $_CONF['contact_table'];
		
		extract(filter($vals));
		
		$query = "UPDATE $contact SET ";
		
		if($contact_name) $query .= "contact_name = '$contact_name', ";
		
		$query .= "contact_email = '$contact_email', contact_phone = '$contact_phone' WHERE contact_id = $contact_id";
		
		//echo $query;

		$DB->Query($query);
	
	}
	
	
	
	
	
	/*************** Delete Contact ****************************/
	function Delete($conid) {
		
		global $DB, $_CONF;
		
		$contact = $_CONF['contact_table'];
		$event = $_CONF['event_table'];
		
		$query = "DELETE FROM $contact WHERE contact_id = $conid";

		$DB->Query($query);
		
		$query = "UPDATE $event SET contact_id = 1 WHERE contact_id = $conid";

		$DB->Query($query);
		
	}
	


}

