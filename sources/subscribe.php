<?php
	
/***********************************************************************
Subscription Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Subscription {
	
	
	
	/************** Add New Users ************************/
	function addNew($uid, $cid, $catid) {
	
		global $DB, $Result, $_CONF;
		
		$s = $_CONF['subscr_table'];

		if(!$cid) $cid=0;

		if(!$catid) $catid=0;
				
		$query = "INSERT INTO $s VALUES( $uid, $cid, $catid)";
		
		$DB->Query($query);
		

	}




	/************** Delete Users ************************/
	function Delete($uid, $cid=null, $catid=null) {
	
		global $DB, $_CONF;
		
		$s = $_CONF['subscr_table'];
		
		$query = "DELETE FROM $s WHERE user_id = $uid AND";
		
		if($cid) { 
			
			$query .= " calendar_id = $cid";
		
		} else {

			$query .= " cat_id = $catid";
		
		}
		
		$DB->Query($query);
	
	}	

	
	

		


}