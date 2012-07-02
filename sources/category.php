<?php

/***********************************************************************
Category Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/



class Category {

	
	
	
	/************************ Add New Category **********************/
	function addNew($vals) {
	
		global $DB, $Result, $_CONF;
		
		extract($vals);

		$category = $_CONF[category_table];
		
		$query = "INSERT INTO $category VALUES(NULL, '$cat_name', '$cat_image')";
		
		$DB->Query($query);

		$query = "SELECT cat_id FROM $category ORDER BY cat_id DESC";

		$data = $Result->getRow($DB->Query($query));
	
		return $data[0];

	}
	
	
	
	
	/************************ Update Category **********************/
	function Update($vals) {
	
		global $DB, $_CONF;

		extract($vals);
	
		$category = $_CONF[category_table];
		
		$query = "UPDATE $category SET "; 
		
		if($cat_name) $query .= " cat_name = '$cat_name', ";

		$query .= " cat_image = '$cat_image'";
		
		$query .= " WHERE cat_id = $cat_id";
	
		$DB->Query($query);
	
	}
	
	
	
	/********************** Delete Category ************************/
	function Delete($catid) {
		
		global $DB, $Result, $Calendar, $_CONF;
		
		$category = $_CONF[category_table];
		$cal = $_CONF[calendar_table]; 
		
		$query = "SELECT * FROM $cal WHERE cat_id = $catid";

		$result = $DB->Query($query);

		while($caldata = $Result->getArray($result)) {
			
			$Calendar->Delete($caldata[calendar_id]);		
		
		}

		$query = "DELETE FROM $category WHERE cat_id = $catid";
		
		$DB->Query($query);
		
	}
	
	

}