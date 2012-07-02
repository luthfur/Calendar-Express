<?php
	
/***********************************************************************
User Privilege Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class UserPriv {
	
	
	
	/************** Add User Privileges ************************/
	function addNew($uid, $cid) {
	
		global $DB, $_CONF;
		
		$userpriv = $_CONF['userpriv_table'];
				
		$query = "INSERT INTO $userpriv VALUES( $uid, $cid)";
	
		$DB->Query($query);
	
	}
	
	
	
	/************** Delete User Privileges ************************/
	function Delete($uid=null, $cid=null) {
	
		global $DB, $_CONF;
		
		$userpriv = $_CONF['userpriv_table'];
				
		$query = "DELETE FROM $userpriv WHERE";
		
		if($uid) $query .= " user_id = $uid";
		
		if($uid && $cid) $query .= " AND";

		if($cid) $query .= " calendar_id = $cid";
				
		$DB->Query($query);
	}
	



}