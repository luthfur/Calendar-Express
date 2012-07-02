<?php
	
/***********************************************************************
Email Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class RegistrationEmail Extends Email {
	
	var $message;
	var $subject;
	var $from;
	var $replyto;
	
		
	/******************** Set Email Body *********************/
	function setMessage($username, $user_id) {
		
		global $Temp, $_CONF;
		
		$activation_url = "$_CONF[calendar_url]/activate.php?uid=$user_id";	
		
		if($_CONF['allow_user_reg'] == 1) { 
		
			$Temp->addVar("activation_url", $activation_url);
			$Temp->addVar("username", $username);
			$Temp->addVar("user_id", $user_id);

			$message = $Temp->parseFile("emailtemplates/regmessage1.tpl.php");
			$subject = $Temp->parseFile("emailtemplates/regsubject1.tpl.php");
					
		} else {
			
			$message = $Temp->parseFile("emailtemplates/regmessage2.tpl.php");
			$subject = $Temp->parseFile("emailtemplates/regsubject2.tpl.php");
		
		}
		
		$this->message = $message;
		
		$this->subject = $subject;
		
		$this->from = "$_CONF[site_name] <$_CONF[support_email]>";
		
		$this->replyto = "$_CONF[support_email]";
		
	}
	
	
	
	
	/**************** send Message ********************************/
	function sendMessage($email, $username, $user_id) {
		
		$this->setMessage( $username, $user_id );
		
		$this->setHeader($this->from, $this->replyto);
		
		$this->setBody($this->message, $this->subject);
		
		$this->send($email);
	
	}


	/**************** Notify Acceptance ********************************/
	function NotifyAcc($user_id) {
		
		global $Temp, $GetUser, $_CONF;

		$userdata = $GetUser->getSingle($user_id);
		
		extract($userdata);

		$Temp->addVar("user_name", $user_name);
		$Temp->addVar("password", $password);

		$this->message = $Temp->parseFile("../emailtemplates/useraccmessage.tpl.php");
		$this->subject = $Temp->parseFile("../emailtemplates/useraccsubject.tpl.php");
		
		$this->from = "$_CONF[site_name] <$_CONF[support_email]>";
		
		$this->replyto = "$_CONF[support_email]";
		
		$this->setHeader($this->from, $this->replyto);
		
		$this->setBody($this->message, $this->subject);
		
		$this->send($email);
	
	}
	

} 


?>