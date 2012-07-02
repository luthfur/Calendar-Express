<?php
	
	class AppEmail Extends Email {
		

		var $message;
		var $subject;
		var $from;
		var $replyto;
		
		
		function setMessage($eid) {
			
			global $Temp, $_CONF, $EventData;
			
					
			$eventdata = $EventData->getSingle($eid);
						
			extract($eventdata);

			$occ = getoccurence($eventdata, 1);
			$date = date($_CONF[date_format], mktime(0, 0, 0, $m, $d, $y));
			
			
			$Temp->addVar("user_name", $eventdata[user_name]);
			$Temp->addVar("event_title", $eventdata[event_title]);
			$Temp->addVar("contact_name", $eventdata[contact_name]);
			$Temp->addVar("contact_email", $eventdata[contact_email]);
			$Temp->addVar("contact_email", $eventdata[contact_email]);
			$Temp->addVar("location_title", $eventdata[location_title]);
			$Temp->addVar("event_desc", $eventdata[event_desc]);
			$Temp->addVar("date", $date);
			$Temp->addVar("occ", $occ);
			$Temp->addVar("message", $message);

			$recmessage = $Temp->parseFile("emailtemplates/recmessage.tpl.php");
			$subject = $Temp->parseFile("emailtemplates/recsubject.tpl.php");
			
			$this->message = $recmessage;
		
			$this->subject = $subject;
		
			$this->from = "$_CONF[site_name] <$_CONF[support_email]>";
		
			$this->replyto = "$_CONF[support_email]";

			return $email;
			
		}
		
		
			
		
	
	/**************** send Message ********************************/
	function sendMessage($id) {
		
		$send_email = $this->setMessage($id);
					
		$this->setHeader($this->from, $this->replyto);
		
		$this->setBody($this->message, $this->subject);
			
		$this->send($send_email);
			
	}
	
			
	
}
	
?>