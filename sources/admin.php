<?php
	
/***********************************************************************
Admin Class (A sub class of the User class)

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Admin extends User {
	
	
	
	/************** Add New Administrator ************************/
	function addNew($vals) {
	
		global $DB, $Result, $_CONF;
				
		$user = $_CONF['user_table'];
		$admin = $_CONF['admin_table'];
		
		//add new user
		parent::addNew($vals);
		
		
		// get userid of newly added user
		$query = "SELECT $user_id FROM $user ORDER BY $user_id DESC LIMIT 0, 1";
		$userdata = $Result->getRow($DB->Query($query));
		$user_id = $userdata[0];
						
		extract($vals);
		
		$query = "INSERT INTO $admin VALUES( NULL, '$user_id', manage_users, manage_events, manage_locations)";
		
		$DB->Query($query);
	
	}
	
	
	
	
	
	/************** Update Administrator ************************/
	function Update($vals) {
	
		global $DB, $Result, $_CONF;
				
		$user = $_CONF['user_table'];
		$admin = $_CONF['admin_table'];
		
		//update user data
		parent::Update($vals);
		
		extract($vals);
		
		$query = "UPDATE $admin SET
							manage_users = $manage_users, 
							manage_events = $manage_events, 
							manage_locations = $manage_locations)";
	
			
		$DB->Query($query);	
			
	}
			




	/************** Delete Administrator ************************/
	function Delete($aid) {
	
		global $DB, $Result, $_CONF;		
		
		$user = $_CONF['user_table'];
		$admin = $_CONF['admin_table'];
					
		$query = "DELETE FROM $admin WHERE admin_id = $aid";
		
		$DB->Query($query);
		
		parent::Delete($user_id);
	
	}	

		


}