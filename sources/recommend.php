<?php
	
	class Recommend Extends Email {
		

		var $message;
		var $subject;
		var $from;
		var $replyto;
		
		
		function setMessage($vals) {
			
			global $Temp, $_CONF, $EventData;
			
			extract($vals);
					
			$eventdata = $EventData->getSingle($eid);
			
			$occ = getoccurence($eventdata, 1);
			$date = date($_CONF[date_format], mktime(0, 0, 0, $m, $d, $y));
			
			$Temp->addVar("rec_name", $rec_name);
			$Temp->addVar("sender_name", $sender_name);
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
		
			$this->from = "$sender_name <$user_email>";
		
			$this->replyto = $user_email;
			
		}
		
		
			
		
	
	/**************** send Message ********************************/
	function sendMessage($vals) {
		
		$this->setMessage($vals);
		
		extract($vals);
			
		$this->setHeader($this->from, $this->replyto);
		
		$this->setBody($this->message, $this->subject);
			
		$this->send($send_email);
			
	}
	
			
	
}
	
?>