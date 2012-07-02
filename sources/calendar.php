<?php

/***********************************************************************
Calendar Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/



class Calendar {
	
	var $calendar_table;
	var $category_table;
	
	
	
	
	/*************** Class Constructor *********************************/
	function Calendar($calendar, $category) {
		
		$this->calendar_table = $calendar;
		$this->category_table = $category;	
		
	}	
		
		
	
	/********************** Add New Calendar ***********************/
	function addNew($vals) {
		
		global $DB;
		
		$calendar = $this->calendar_table;
		
		extract($vals);
		
		$query = "INSERT INTO $calendar VALUES(NULL, $cat_id, '$calendar_name', '$calendar_image', '$calendar_icon')";
		
		//echo $query;

		$DB->Query($query);

		$query = "SELECT calendar_id FROM $calendar ORDER BY calendar_id DESC LIMIT 0, 1";

		return $DB->Query($query);

		
	}

	
	
	
	/********************** Update Calendar ************************/
	function Update($vals) {
		
		global $DB;
		
		$calendar = $this->calendar_table;
		
		extract($vals);
		
		$query .= "UPDATE $calendar SET";
		
		if($calendar_name) $query .= " calendar_name = '$calendar_name',";
		
		$query  .= " cat_id = $cat_id,";

		$query  .= " calendar_image = '$calendar_image',";
		
		$query  .= "calendar_icon = '$calendar_icon' WHERE calendar_id = $calendar_id";
		
		
		$DB->Query($query);
		
	}
	
	
	
	
	/***************** Switch Calendar Category ************************/
	function switchCategory($cid, $catid) {
		
		global $DB;
		
		$calendar = $this->calendar_table;
		
		$query = "UPDATE $calendar SET cat_id = $catid WHERE calendar_id = $cid";
				
		$DB->Query($query);
		
	}
		
	
	
	
	/********************** Delete Calendar ************************/
	function Delete($cid) {
		
		global $DB, $_CONF;
		
		$calendar = $this->calendar_table;
		$privileges = $_CONF[userpriv_table];
		
		$query = "DELETE FROM $calendar WHERE calendar_id = $cid";
		
		$DB->Query($query);

		$query = "DELETE FROM $privileges WHERE calendar_id = $cid";
		
		$DB->Query($query);

	}
	
}

?>