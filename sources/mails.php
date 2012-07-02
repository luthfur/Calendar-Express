<?php
	
/***********************************************************************
Location Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class UserMail {
	
	
	
	/***************** Add New Location ****************************/
	function addNew($vals) {
	
		global $DB, $_CONF, $Result;
		
		$email = $_CONF['email_table'];
		
		extract(filter($vals));
		
		$query = "INSERT INTO $email VALUES( NULL, NULL, '$email_subj', '$email_message')";
				
		
		$DB->Query($query);

		$query = "SELECT message_id FROM $email ORDER BY message_id DESC";
		
		$data = $Result->getRow($DB->Query($query));
		
		return $data[0];
		
	}
	
	
		
	
	/*************** Delete Location ****************************/
	function Delete($mid) {
		
		global $DB, $_CONF;
		
		$email = $_CONF['email_table'];
		
		$query = "DELETE FROM $email WHERE message_id = $mid";
		
		$DB->Query($query);
		
		
	}


	/************ Send Mass Email *************************/
	function sendMessage($subject, $message) {
	
		global $GetUser, $Email, $Result, $_CONF;

		$userresult = $GetUser->getList();
		
		$from = "$_CONF[site_name] <$_CONF[support_email]>";
		
		$replyto = "$_CONF[support_email]";

		$Email->setHeader($from, $replyto);
		$Email->setBody($message, $subject);

		while ($userdata = $Result->getArray($userresult)) {
		
			// Send each email
			$Email->send($userdata[email]);

		}
	
	}

	


}

