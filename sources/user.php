<?php
	
/***********************************************************************
User Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class User {
	
	
	
	/************** Add New Users ************************/
	function addNew($vals, $active=null) {
	
		global $DB, $Result, $_CONF;
		
		$user = $_CONF['user_table'];
		
		extract($vals);
		
		$query = "INSERT INTO $user VALUES( NULL, '$user_name', MD5('$user_pass'), NULL, $status, '$fullname', '$phone', '$email'";
		
		if($active)  {
			
			$query .= ",1";

		} else {
		
			$query .= ",0";

		}


		$query .= ")";

		//echo $query;
		
		
		$DB->Query($query);
		
		$query = "SELECT user_id FROM $user WHERE user_name = '$user_name' ORDER BY user_id DESC";
		
		$data = $Result->getRow($DB->Query($query));
	
		return $data[0];

	}
	
	
	
	/************** Update Users ************************/
	function Update($vals) {
	
		global $DB, $_CONF;
		
		$user = $_CONF['user_table'];
		
		extract($vals);
		
		$query = "UPDATE $user SET
							status = $status, 
							full_name = '$full_name', 
							telephone = '$telephone'";
		
		if($user_name) $query .= ", user_name = '$user_name'";
		if($email) $query .= ", email = '$email'";
		
		$query .= "WHERE user_id = $user_id";
		
		$DB->Query($query);	
		
	
	
	}
			


	/************** Delete Users ************************/
	function Delete($uid) {
	
		global $DB, $_CONF;
		
		$user = $_CONF['user_table'];
		$privileges = $_CONF[userpriv_table];
		
		$query = "DELETE FROM $user WHERE user_id = $uid";
		
		$DB->Query($query);

		$query = "DELETE FROM $privileges WHERE user_id = $uid";
		
		$DB->Query($query);
	
	}	

	
	
	/************** Activate User Registration ************************/
	function Activate($uid) {
	
		global $DB, $_CONF;
		
		$user = $_CONF['user_table'];
		
		$query = "UPDATE $user SET active = 1 WHERE user_id = $uid";
		
		$DB->Query($query);	
	
	}
	

	/************** Reject User Registration ************************/
	function Reject($uid) {
	
		global $DB, $_CONF;
		
		$this->Delete($uid);
	
	}
		


}