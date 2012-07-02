<?php
	
/***********************************************************************
Email Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Reminder Extends Email {
	
	var $message;
	var $subject;
	var $from;
	var $replyto;
	


	/******************** PreSet Email Header *********************/
	function presetHeader() {
		
		global $_CONF;
							
			$this->from = "$_CONF[site_name] <$_CONF[support_email]>";
		
			$this->replyto = "$_CONF[support_email]";
		
		
	}


		
	/******************** Set Email Body *********************/
	function setMessage( $eventset, $calname, $user_name ) {
		
		global $Temp, $_CONF, $EventData;
							
			
			$Temp->addVar("eventset", $eventset);
			$Temp->addVar("calname", $calname);
			$Temp->addVar("user_name", $user_name);

			$message = $Temp->parseFile("emailtemplates/remindermessage.tpl.php");
			$subject = $Temp->parseFile("emailtemplates/remindersubject.tpl.php");
			
			$this->message = $message;
		
			$this->subject = $subject;
				
	}
	
	
	
	
	/**************** send Message ********************************/
	function sendMessage($eventset, $cid=null, $calname = null) {

		global $GetSub, $Result, $_CONF;

		$this->presetHeader();
		
		$this->setHeader($this->from, $this->replyto);
				
		$result = $GetSub->getList(0,$cid);

		while($emaildata = $Result->getArray($result)) {

			$this->setMessage($eventset, $calname, $emaildata[user_name]);
		
			$this->setBody($this->message, $this->subject);

			$this->send($emaildata[email]);
			
		}
		
		
		
		
	
	}


	

} 


?>