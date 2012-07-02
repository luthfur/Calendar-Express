<?php
		
/***********************************************************************
User Session Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class UserSession {
	
	

	/************************ Register Session ******************************/
	function Register($userdata) {
		
		extract($userdata);
		
		$_SESSION['calexp_userid'] = $user_id;
		$_SESSION['calexp_username'] = $user_name;
		$_SESSION['calexp_fullname'] = $full_name;
		$_SESSION['calexp_email'] = $email;
		
	}

	
	/********************** Check if session has been registered ***************/
	function Check() {
	
		if(isset($_SESSION['calexp_username'])) {
			return 1;
		} else {
			return 0;
		}
	}
	
	
	/*************************** Get user Data *******************************/
	function GetData() {
	
		if($this->Check()) {
			
			$userdata = array();
			$userdata['username'] = $_SESSION['calexp_username'];
			$userdata['username'] = $_SESSION['calexp_username'];
			$userdata['fullname'] = $_SESSION['calexp_fullname'];
			$userdata['email'] = $_SESSION['calexp_email'];
			$userdata['user_id'] = $_SESSION['calexp_userid'];

			return $userdata;
		}
	
	
	}
	
	
	
	/*************************** Destroy Session *******************************/
	function Destroy() {
	
		session_destroy();	
	
	}
	


}