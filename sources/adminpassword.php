<?php
	
/***********************************************************************
Admin Password Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class AdminPassword {
	
	

	/***************** Authenticate User Password ******************/
	function Check($user_name, $user_pass = null, $returnrow=null, $email=null) {
		
		global $DB, $Result, $_CONF;
		
		$return = 0;

		$user_name = filter($user_name);
		$user_pass = filter($user_pass);
		
		$user = $_CONF['user_table'];
				
		$query = "SELECT * FROM $user WHERE user_name ='$user_name' AND (status=1 OR status=2)";
		
		if($user_pass) $query .= " AND password=MD5('$user_pass')";
		
		if($email) $query .= "AND email='$email'";

		$result = $DB->Query($query);
		
		if($Result->numRows($result)) {
			
			if($returnrow) {
				return $Result->getArray($result);
			} else {
				$return = 1;
			}
			
		}

		return $return;
	
	}
	
	
	
	
	/********************* Change User Password *********************/
	function Change($user_name, $user_pass) {
	
		global $DB, $Result, $_CONF;
		
		$user_name = filter($user_name);
		$user_pass = filter($user_pass);
		
		$user = $_CONF['user_table'];
				
		$query = "UPDATE $user SET password = MD5('$user_pass') WHERE user_name = '$user_name'";
		

		$result = $DB->Query($query);
	
	
	}
	
	
	
	
	/******************** Forgotten Password ********************/
	function SendPass($vals) {
	
		global $Email, $Temp, $_CONF;

		extract($vals);
		
		$user_pass = generatepass();

		$this->Change($user_name, $user_pass);
		
		$Temp->addVar("user_name", $user_name);
		$Temp->addVar("password", $user_pass);
		
		$message = $Temp->parseFile("../emailtemplates/passmessage.tpl.php");
		$subject = $Temp->parseFile("../emailtemplates/passsubject.tpl.php");
		
		$from = "$_CONF[site_name] <$_CONF[support_email]>";
	

		$Email->setHeader($from, $_CONF[support_email]);
		
		$Email->setBody($message, $subject);
		
		$Email->send($vals[email]);
	
	}
	
	



}