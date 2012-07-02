<?php
	
/***********************************************************************
Email Class

This module is part of Calendar Express Pro.
	
(c)2003 Phplite.com. All Rights Reserved.
************************************************************************/


class Email {
	
	var $mail_header;
	var $mail_body;
	var $mail_subject;
	
	
	
	
	/******************** Set Email Header *********************/
	function setHeader($mail_from, $mail_reply_to) {
		
		$mail_header = "From: $mail_from\n";
		$mail_header .= "Reply-to: $mail_reply_to\n";
		
		$this->mail_header = $mail_header;
	
	}
	
	
	
	
	/**************** Set Mail Body and Subject **************/
	function setBody($mail_body, $mail_subject) {
		
		$this->mail_body = $mail_body;
		$this->mail_subject = $mail_subject;
	
	}
	
	
	
	
	/**************** Set Mail Body and Subject **************/
	function send($email) {
		
		if(!mail($email, $this->mail_subject, $this->mail_body, $this->mail_header)) die("Error!");
	
	}	
	


}



?>