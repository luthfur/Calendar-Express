<?php 

	include 'common.php';


	$Temp->display("overallheader.tpl.php");

	$Temp->display("pageheader.tpl.php");

		
	$calresult = $GetUserPriv->getList(0,0,0,0,$uid);
	$locresult = $GetLocation->getList(0,"location_title","ASC",0);
	$conresult = $GetContact->getList(0,"contact_name","ASC",$uid);

	
	if($cid) {

		if(!$GetUserPriv->Exist($cid,$uid)) $nopriv = 1;
		$caldata = $GetCalendar->getSingle($cid);
		$Temp->addVar("nopriv", $nopriv);
		$Temp->addVar("calname", $caldata['calendar_name']);

	}


	$Temp->addVar("calresult", $calresult);
	$Temp->addVar("locresult", $locresult);
	$Temp->addVar("conresult", $conresult);
	$Temp->addVar("uid", $uid);
	

	$Temp->display("eventform.tpl.php");

	$Temp->display("pagefooter.tpl.php");

?>
