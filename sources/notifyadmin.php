<?php
	
/***********************************************************************
Email Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class NotifyAdmin Extends Email {
	
		
	/******************** Set Email Body *********************/
	function NotifyAdmin(&$Temp) {

		global $_CONF;
		$url =  $_CONF[calendar_url] . "/admin";
		$Temp->addVar("site_name", $_CONF[site_name]);
		$Temp->addVar("calendar_url", $url);
					
		$message = $Temp->parseFile("emailtemplates/notifyadmin_message.tpl.php");
		$subject = $Temp->parseFile("emailtemplates/notifyadmin_subject.tpl.php");
		
				
		$from = "$_CONF[site_name] <$_CONF[support_email]>";
		
		$replyto = "$_CONF[support_email]";
		
		parent::setHeader($from, $replyto);
		parent::setBody($message, $subject);

	}



	function send() {
		
		global $_CONF;

		parent::send($_CONF[support_email]);		

	}
	
} 


?>