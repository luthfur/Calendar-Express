<?php
		
/***********************************************************************
Admin Session Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class AdminSession {
	
	

	/************************ Register Session ******************************/
	function Register($userdata) {
		
		extract($userdata);
		
		$_SESSION['calexp_userid'] = $user_id;
		$_SESSION['calexp_username'] = $user_name;
		$_SESSION['calexp_fullname'] = $full_name;
		$_SESSION['calexp_email'] = $email;
		$_SESSION['calexp_status'] = $status;
	}

	
	/********************** Check if session has been registered ***************/
	function Check() {
	
		if(isset($_SESSION['calexp_status'])) {
			return 1;
		} else {
			return 0;
		}
	}
	
	
	/*************************** Get user Data *******************************/
	function GetData() {
	
		if($this->Check()) {
			
			$admindata = array();
			$admindata['user_name'] = $_SESSION['calexp_username'];
			$admindata['email'] = $_SESSION['calexp_email'];
			$admindata['user_id'] = $_SESSION['calexp_userid'];
			$admindata['status'] = $_SESSION['calexp_userid'];
			$admindata['full_name'] = $_SESSION['calexp_fullname'];

			return $admindata;
		}
	
	
	}
	
	
	
	/*************************** Destroy Session *******************************/
	function Destroy() {
	
		session_destroy();	
	
	}
	


}