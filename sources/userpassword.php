<?php
	
/***********************************************************************
User Password Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class UserPassword {
	
	

	/***************** Authenticate User Password ******************/
	function Check($user_name, $user_pass, $returnrow=null, $email=null) {
		
		global $DB, $Result, $_CONF;
		
		$user_name = filter($user_name);
		$user_pass = filter($user_pass);
		$email = filter($email);
		
		$user = $_CONF['user_table'];
				
		$query = "SELECT * FROM $user WHERE user_name ='$user_name' AND ";

		if($user_pass) $query .= "password=MD5('$user_pass')";
		
		if($email) $query .= "email='$email'";

		$result = $DB->Query($query);
		
		if($Result->numRows($result)) {
			
			if($returnrow) {
				return $Result->getArray($result);
			} else {
				return 1;
			}
			
		}
	
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
		
		$message = $Temp->parseFile("emailtemplates/passmessage.tpl.php");
		$subject = $Temp->parseFile("emailtemplates/passsubject.tpl.php");
		
		$from = "$_CONF[site_name] <$_CONF[support_email]>";
	

		$Email->setHeader($from, $_CONF[support_email]);
		
		$Email->setBody($message, $subject);
		
		$Email->send($vals[email]);
	
	}
	
	



}